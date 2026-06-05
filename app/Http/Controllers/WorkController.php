<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WorkController extends Controller
{
    public function index(Request $request)
    {
        $allProjects = collect([
            (object)['id' => 1, 'title' => 'Meridian Hotels', 'slug' => 'meridian-hotels', 'tagline' => 'Luxury redefined through digital craft', 'year' => '2025', 'service' => 'Web Design', 'sector' => 'Hospitality', 'thumbnail' => '/images/projects/meridian.jpg'],
            (object)['id' => 2, 'title' => 'Volta Energy', 'slug' => 'volta-energy', 'tagline' => 'Powering the future with bold identity', 'year' => '2025', 'service' => 'Branding', 'sector' => 'Energy', 'thumbnail' => '/images/projects/volta.jpg'],
            (object)['id' => 3, 'title' => 'Aura Skincare', 'slug' => 'aura-skincare', 'tagline' => 'Beauty meets conversion-first ecommerce', 'year' => '2024', 'service' => 'Web Design', 'sector' => 'Beauty & Wellness', 'thumbnail' => '/images/projects/aura.jpg'],
            (object)['id' => 4, 'title' => 'Kinetic Sports', 'slug' => 'kinetic-sports', 'tagline' => 'A brand that moves as fast as its athletes', 'year' => '2024', 'service' => 'Digital Marketing', 'sector' => 'Sports & Fitness', 'thumbnail' => '/images/projects/kinetic.jpg'],
            (object)['id' => 5, 'title' => 'Craft & Co', 'slug' => 'craft-and-co', 'tagline' => 'Artisanal spirits deserve an artisanal web presence', 'year' => '2024', 'service' => 'Branding', 'sector' => 'Food & Drink', 'thumbnail' => '/images/projects/craft.jpg'],
            (object)['id' => 6, 'title' => 'Nexus Finance', 'slug' => 'nexus-finance', 'tagline' => 'Making fintech feel human', 'year' => '2023', 'service' => 'Web Design', 'sector' => 'Finance', 'thumbnail' => '/images/projects/nexus.jpg'],
            (object)['id' => 7, 'title' => 'Verde Living', 'slug' => 'verde-living', 'tagline' => 'Sustainable living, beautifully presented', 'year' => '2023', 'service' => 'Branding', 'sector' => 'Property', 'thumbnail' => '/images/projects/verde.jpg'],
            (object)['id' => 8, 'title' => 'Pulse Health', 'slug' => 'pulse-health', 'tagline' => 'Digital health platform reimagined', 'year' => '2023', 'service' => 'Web Design', 'sector' => 'Healthcare', 'thumbnail' => '/images/projects/pulse.jpg'],
        ]);

        $serviceFilter = $request->get('service');
        $sectorFilter = $request->get('sector');

        $projects = $allProjects;

        if ($serviceFilter) {
            $projects = $projects->filter(fn($p) => $p->service === $serviceFilter);
        }
        if ($sectorFilter) {
            $projects = $projects->filter(fn($p) => $p->sector === $sectorFilter);
        }

        $serviceFilters = $allProjects->pluck('service')->unique()->values();
        $sectorFilters = $allProjects->pluck('sector')->unique()->values();

        return view('pages.work.index', compact('projects', 'serviceFilters', 'sectorFilters', 'serviceFilter', 'sectorFilter'));
    }

    public function show($slug)
    {
        $projects = collect([
            'meridian-hotels' => (object)[
                'id' => 1, 'title' => 'Meridian Hotels', 'slug' => 'meridian-hotels',
                'tagline' => 'Luxury redefined through digital craft',
                'year' => '2025', 'service' => 'Web Design', 'sector' => 'Hospitality',
                'hero_image' => '/images/projects/meridian-hero.jpg',
                'thumbnail' => '/images/projects/meridian.jpg',
                'client' => 'Meridian Hotels Group',
                'timeline' => '12 weeks',
                'services_used' => ['UX/UI Design', 'WordPress Development', 'SEO'],
                'challenge' => 'Meridian Hotels had an outdated website that failed to convey the luxury and sophistication of their brand. Online bookings were declining, and guests were choosing competitors with more polished digital experiences. They needed a complete digital overhaul that would match the five-star experience of their physical properties.',
                'solution' => 'We created an immersive, visually stunning website that lets the properties speak for themselves. Large-format photography, smooth scroll animations, and an intuitive booking flow work together to create a seamless journey from inspiration to reservation. Every interaction was designed to evoke the feeling of arriving at a Meridian property.',
                'results' => [
                    (object)['metric' => '67.6%', 'label' => 'Increase in direct bookings'],
                    (object)['metric' => '42%', 'label' => 'Reduction in bounce rate'],
                    (object)['metric' => '3.2x', 'label' => 'Increase in time on site'],
                    (object)['metric' => '28%', 'label' => 'Growth in organic traffic'],
                ],
                'gallery' => ['/images/projects/meridian-1.jpg', '/images/projects/meridian-2.jpg', '/images/projects/meridian-3.jpg'],
                'testimonial' => (object)['quote' => 'DIVER.ENT completely transformed our digital presence.', 'name' => 'Sarah Mitchell', 'role' => 'Marketing Director'],
            ],
        ]);

        $project = $projects->get($slug);

        if (!$project) {
            // Fallback generic project
            $project = (object)[
                'id' => 99, 'title' => ucwords(str_replace('-', ' ', $slug)), 'slug' => $slug,
                'tagline' => 'A case study in digital excellence',
                'year' => '2024', 'service' => 'Web Design', 'sector' => 'Technology',
                'hero_image' => '/images/projects/default-hero.jpg',
                'thumbnail' => '/images/projects/default.jpg',
                'client' => ucwords(str_replace('-', ' ', $slug)),
                'timeline' => '10 weeks',
                'services_used' => ['UX/UI Design', 'Development', 'Strategy'],
                'challenge' => 'The client needed a complete digital transformation that would set them apart in an increasingly competitive market. Their existing digital presence was dated and failing to capture their brand essence.',
                'solution' => 'We delivered a comprehensive redesign grounded in strategic insight and executed with meticulous attention to detail. Every element was crafted to drive engagement and conversion.',
                'results' => [
                    (object)['metric' => '58%', 'label' => 'Increase in engagement'],
                    (object)['metric' => '34%', 'label' => 'Reduction in bounce rate'],
                    (object)['metric' => '2.8x', 'label' => 'Increase in conversions'],
                    (object)['metric' => '45%', 'label' => 'Growth in traffic'],
                ],
                'gallery' => ['/images/projects/default-1.jpg', '/images/projects/default-2.jpg'],
                'testimonial' => (object)['quote' => 'An outstanding digital partner.', 'name' => 'Client Name', 'role' => 'Director'],
            ];
        }

        $relatedProjects = collect([
            (object)['id' => 2, 'title' => 'Volta Energy', 'slug' => 'volta-energy', 'tagline' => 'Powering the future with bold identity', 'service' => 'Branding', 'thumbnail' => '/images/projects/volta.jpg'],
            (object)['id' => 3, 'title' => 'Aura Skincare', 'slug' => 'aura-skincare', 'tagline' => 'Beauty meets conversion-first ecommerce', 'service' => 'Web Design', 'thumbnail' => '/images/projects/aura.jpg'],
        ]);

        return view('pages.work.show', compact('project', 'relatedProjects'));
    }
}
