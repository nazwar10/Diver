<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SectorController extends Controller
{
    public function show($slug)
    {
        $sectors = collect([
            'hospitality' => (object)['name' => 'Hospitality', 'slug' => 'hospitality', 'description' => 'Creating luxurious digital experiences for hotels, restaurants, and travel brands.'],
            'energy' => (object)['name' => 'Energy', 'slug' => 'energy', 'description' => 'Bold brand identities and digital platforms for the energy sector.'],
            'beauty-wellness' => (object)['name' => 'Beauty & Wellness', 'slug' => 'beauty-wellness', 'description' => 'Stunning ecommerce and brand experiences for beauty and wellness brands.'],
            'sports-fitness' => (object)['name' => 'Sports & Fitness', 'slug' => 'sports-fitness', 'description' => 'Dynamic digital experiences for sports and fitness brands.'],
            'food-drink' => (object)['name' => 'Food & Drink', 'slug' => 'food-drink', 'description' => 'Mouth-watering digital presence for food and beverage brands.'],
            'finance' => (object)['name' => 'Finance', 'slug' => 'finance', 'description' => 'Making fintech feel human with thoughtful design and user experience.'],
            'property' => (object)['name' => 'Property', 'slug' => 'property', 'description' => 'Sophisticated digital platforms for real estate and property developers.'],
            'healthcare' => (object)['name' => 'Healthcare', 'slug' => 'healthcare', 'description' => 'Accessible, trustworthy digital solutions for healthcare providers.'],
        ]);

        $sector = $sectors->get($slug);

        if (!$sector) {
            abort(404);
        }

        $projects = collect([
            (object)['id' => 1, 'title' => 'Featured Project', 'slug' => 'featured-project', 'tagline' => 'A showcase of our work in ' . $sector->name, 'service' => 'Web Design', 'thumbnail' => '/images/projects/default.jpg'],
        ]);

        return view('pages.sector', compact('sector', 'projects'));
    }
}
