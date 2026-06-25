<?php

namespace App\Http\Controllers;

use App\Models\IndustrySector;
use App\Models\Project;
use App\Models\Service;
use Illuminate\Http\Request;

class WorkController extends Controller
{
    public function index(Request $request)
    {
        $serviceFilter = $request->get('service');
        $sectorFilter = $request->get('sector');

        $projectsQuery = Project::query()
            ->with(['results', 'services', 'sectors'])
            ->published()
            ->ordered();

        if ($serviceFilter) {
            $projectsQuery->whereHas('services', fn ($query) => $query->where('name', $serviceFilter));
        }

        if ($sectorFilter) {
            $projectsQuery->whereHas('sectors', fn ($query) => $query->where('name', $sectorFilter));
        }

        $projects = $projectsQuery->get();

        $serviceFilters = Service::query()
            ->ordered()
            ->pluck('name')
            ->values();

        $sectorFilters = IndustrySector::query()
            ->ordered()
            ->pluck('name')
            ->values();

        return view('pages.work.index', compact(
            'projects',
            'serviceFilters',
            'sectorFilters',
            'serviceFilter',
            'sectorFilter'
        ));
    }

    public function show(string $slug)
    {
        $project = Project::query()
            ->with(['results', 'services', 'sectors', 'testimonials'])
            ->published()
            ->where('slug', $slug)
            ->firstOrFail();

        $relatedProjectsQuery = Project::query()
            ->with(['services', 'sectors'])
            ->published()
            ->whereKeyNot($project->getKey())
            ->ordered();

        $serviceIds = $project->services->pluck('id');
        $sectorIds = $project->sectors->pluck('id');

        if ($serviceIds->isNotEmpty() || $sectorIds->isNotEmpty()) {
            $relatedProjectsQuery->where(function ($query) use ($serviceIds, $sectorIds) {
                if ($serviceIds->isNotEmpty()) {
                    $query->whereHas('services', fn ($serviceQuery) => $serviceQuery->whereIn('services.id', $serviceIds));
                }

                if ($sectorIds->isNotEmpty()) {
                    $query->orWhereHas('sectors', fn ($sectorQuery) => $sectorQuery->whereIn('industry_sectors.id', $sectorIds));
                }
            });
        }

        $relatedProjects = $relatedProjectsQuery
            ->take(2)
            ->get();

        return view('pages.work.show', compact('project', 'relatedProjects'));
    }
}
