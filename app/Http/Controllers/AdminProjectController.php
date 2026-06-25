<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminProjectRequest;
use App\Models\IndustrySector;
use App\Models\Project;
use App\Models\Service;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Arr;
use Illuminate\View\View;

class AdminProjectController extends Controller
{
    public function index(): View
    {
        $projects = Project::query()
            ->with(['results', 'services', 'sectors'])
            ->latest()
            ->get();

        return view('admin.projects.index', compact('projects'));
    }

    public function create(): View
    {
        return view('admin.projects.form', [
            'project' => new Project(),
            'services' => Service::query()->ordered()->get(),
            'sectors' => IndustrySector::query()->ordered()->get(),
            'selectedServiceIds' => [],
            'selectedSectorIds' => [],
            'results' => collect([(object) ['metric' => '', 'label' => '', 'period' => '', 'direction' => 'increase']]),
            'galleryImagesText' => '',
            'servicesUsedText' => '',
            'mode' => 'create',
        ]);
    }

    public function store(AdminProjectRequest $request): RedirectResponse
    {
        $project = Project::create($this->projectPayload($request));

        $this->syncRelations($project, $request);

        return redirect()
            ->route('admin.projects.edit', $project)
            ->with('success', 'Project berhasil dibuat.');
    }

    public function edit(Project $project): View
    {
        $project->load(['results', 'services', 'sectors']);

        $results = $project->results->map(fn ($result) => (object) [
            'metric' => $result->percentage,
            'label' => $result->description,
            'period' => $result->period,
            'direction' => $result->direction,
        ]);

        if ($results->isEmpty()) {
            $results = collect([(object) ['metric' => '', 'label' => '', 'period' => '', 'direction' => 'increase']]);
        }

        return view('admin.projects.form', [
            'project' => $project,
            'services' => Service::query()->ordered()->get(),
            'sectors' => IndustrySector::query()->ordered()->get(),
            'selectedServiceIds' => $project->services->pluck('id')->all(),
            'selectedSectorIds' => $project->sectors->pluck('id')->all(),
            'results' => $results,
            'galleryImagesText' => implode(PHP_EOL, $project->gallery_images ?? []),
            'servicesUsedText' => implode(PHP_EOL, $project->services_used ?? []),
            'mode' => 'edit',
        ]);
    }

    public function update(AdminProjectRequest $request, Project $project): RedirectResponse
    {
        $project->update($this->projectPayload($request));

        $this->syncRelations($project, $request);

        return redirect()
            ->route('admin.projects.edit', $project)
            ->with('success', 'Project berhasil diperbarui.');
    }

    protected function projectPayload(AdminProjectRequest $request): array
        {
            $project = $request->route('project');

            $thumbnailPath = $project?->thumbnail_path;

            if ($request->hasFile('thumbnail')) {
                $thumbnailPath = '/storage/' .
                    $request->file('thumbnail')
                        ->store('projects', 'public');
            }

            $heroImagePath = $project?->hero_image_path;

            if ($request->hasFile('hero_image')) {
                $heroImagePath = '/storage/' .
                    $request->file('hero_image')
                        ->store('projects', 'public');
            }

            $galleryImages = $project?->gallery_images ?? [];

            if ($request->hasFile('gallery_images')) {

                $galleryImages = [];

                foreach ($request->file('gallery_images') as $image) {

                    $galleryImages[] =
                        '/storage/' .
                        $image->store('projects', 'public');
                }
            }

            return [
                'title' => $request->string('title')->toString(),
                'slug' => $request->string('slug')->toString(),
                'client_name' => $request->input('client_name'),
                'year' => $request->integer('year'),
                'tagline' => $request->input('tagline'),
                'timeline' => $request->input('timeline'),
                'description' => $request->input('description'),
                'challenge' => $request->input('challenge'),
                'solution' => $request->input('solution'),

                'thumbnail_path' => $thumbnailPath,
                'hero_image_path' => $heroImagePath,
                'gallery_images' => $galleryImages,

                'services_used' => $this->linesToArray(
                    $request->input('services_used_text')
                ),

                'is_featured' => $request->boolean('is_featured'),
                'order' => $request->integer('order'),
                'meta_title' => $request->input('meta_title'),
                'meta_description' => $request->input('meta_description'),
                'published_at' => $request->input('published_at') ?: null,
            ];
        }

    protected function syncRelations(Project $project, AdminProjectRequest $request): void
    {
        $project->services()->sync($request->input('service_ids', []));
        $project->sectors()->sync($request->input('sector_ids', []));

        // Results are replaced atomically so the admin form stays simple.
        $project->results()->delete();

        $rows = collect($request->input('results', []))
            ->map(fn (array $row, int $index) => [
                'percentage' => trim((string) Arr::get($row, 'metric')),
                'description' => trim((string) Arr::get($row, 'label')),
                'period' => trim((string) Arr::get($row, 'period')) ?: null,
                'direction' => Arr::get($row, 'direction', 'increase'),
                'order' => $index,
            ])
            ->filter(fn (array $row) => $row['percentage'] !== '' && $row['description'] !== '')
            ->values();

        $rows->each(fn (array $row) => $project->results()->create($row));
    }

    protected function linesToArray(?string $value): array
    {
        return collect(preg_split('/\r\n|\r|\n/', (string) $value))
            ->map(fn (string $line) => trim($line))
            ->filter()
            ->values()
            ->all();
    }
}
