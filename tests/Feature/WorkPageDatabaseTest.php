<?php

namespace Tests\Feature;

use App\Models\IndustrySector;
use App\Models\Project;
use App\Models\Service;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class WorkPageDatabaseTest extends TestCase
{
    use RefreshDatabase;

    public function test_work_pages_render_project_from_database(): void
    {
        $service = Service::create([
            'slug' => 'branding',
            'name' => 'Branding',
        ]);

        $sector = IndustrySector::create([
            'slug' => 'energy',
            'name' => 'Energy',
        ]);

        $project = Project::create([
            'title' => 'Volta Energy',
            'slug' => 'volta-energy',
            'year' => 2025,
            'tagline' => 'Powering the future with bold identity',
            'description' => 'A complete digital transformation.',
            'challenge' => 'The old site felt generic.',
            'solution' => 'We built a sharper identity.',
            'published_at' => now(),
        ]);

        $project->services()->attach($service->id);
        $project->sectors()->attach($sector->id);
        $project->results()->create([
            'percentage' => '70.8%',
            'direction' => 'increase',
            'description' => 'Brand recognition uplift',
            'order' => 1,
        ]);

        $this->get(route('work'))
            ->assertOk()
            ->assertSee('Volta Energy')
            ->assertSee('Branding');

        $this->get(route('work.show', $project->slug))
            ->assertOk()
            ->assertSee('Volta Energy')
            ->assertSee('The old site felt generic.')
            ->assertSee('Brand recognition uplift');
    }
}
