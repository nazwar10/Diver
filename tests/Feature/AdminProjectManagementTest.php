<?php

namespace Tests\Feature;

use App\Models\IndustrySector;
use App\Models\Project;
use App\Models\Service;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminProjectManagementTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_create_a_project_with_results(): void
    {
        $admin = User::factory()->create([
            'email' => 'admin@example.com',
            'is_admin' => true,
        ]);

        $service = Service::create([
            'slug' => 'web-design',
            'name' => 'Web Design',
        ]);

        $sector = IndustrySector::create([
            'slug' => 'hospitality',
            'name' => 'Hospitality',
        ]);

        $response = $this
            ->actingAs($admin)
            ->post(route('admin.projects.store'), [
                'title' => 'Meridian Hotels',
                'slug' => 'meridian-hotels',
                'client_name' => 'Meridian Hotels Group',
                'year' => 2025,
                'tagline' => 'Luxury redefined through digital craft',
                'timeline' => '12 weeks',
                'description' => 'Overview project.',
                'challenge' => 'Challenge text',
                'solution' => 'Solution text',
                'service_ids' => [$service->id],
                'sector_ids' => [$sector->id],
                'results' => [
                    [
                        'metric' => '67.6%',
                        'label' => 'Increase in direct bookings',
                        'period' => 'Q1 2025',
                        'direction' => 'increase',
                    ],
                ],
                'is_featured' => '1',
                'order' => 1,
                'published_at' => now()->format('Y-m-d H:i:s'),
            ]);

        $project = Project::where('slug', 'meridian-hotels')->first();

        $response->assertRedirect(route('admin.projects.edit', $project));
        $this->assertNotNull($project);
        $this->assertDatabaseHas('project_results', [
            'project_id' => $project->id,
            'percentage' => '67.6%',
            'description' => 'Increase in direct bookings',
        ]);
        $this->assertDatabaseHas('project_service', [
            'project_id' => $project->id,
            'service_id' => $service->id,
        ]);
        $this->assertDatabaseHas('project_sector', [
            'project_id' => $project->id,
            'industry_sector_id' => $sector->id,
        ]);
    }

    public function test_non_admin_cannot_access_admin_project_list(): void
    {
        $user = User::factory()->create(['is_admin' => false]);

        $this->actingAs($user)
            ->get(route('admin.projects.index'))
            ->assertForbidden();
    }
}
