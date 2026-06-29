<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AgencyController extends Controller
{
    public function index()
    {
        $teamMembers = collect([
            (object)['name' => 'Marcus Webb', 'role' => 'Creative Director & Founder', 'photo' => '/images/team/marcus.jpg', 'bio' => 'With 15 years in digital design, Marcus founded DIVER.ENT to create a studio where brand strategy and beautiful design are inseparable.'],
            (object)['name' => 'Alex Turner', 'role' => 'Lead Designer', 'photo' => '/images/team/alex.jpg', 'bio' => 'Alex brings a rare blend of artistic vision and technical precision. Her work has been recognised by Awwwards, CSSDA, and FWA.'],
            (object)['name' => 'Priya Sharma', 'role' => 'Head of Strategy', 'photo' => '/images/team/priya.jpg', 'bio' => 'Priya turns data into insight and insight into action. She leads our strategic practice, ensuring every project is grounded in research.'],
            (object)['name' => 'James O\'Brien', 'role' => 'Technical Director', 'photo' => '/images/team/james.jpg', 'bio' => 'James oversees all development, architecting scalable solutions that are as robust as they are elegant.'],
            (object)['name' => 'Sofia Andersson', 'role' => 'Senior Developer', 'photo' => '/images/team/sofia.jpg', 'bio' => 'Full-stack developer with a passion for clean code and performance optimisation. Sofia makes complex things look simple.'],
            (object)['name' => 'David Kim', 'role' => 'Digital Marketing Manager', 'photo' => '/images/team/david.jpg', 'bio' => 'David drives measurable growth through SEO, PPC, and content strategy. He\'s obsessed with turning clicks into customers.'],
            (object)['name' => 'Lena Rossi', 'role' => 'Brand Designer', 'photo' => '/images/team/lena.jpg', 'bio' => 'Lena creates visual identities that resonate. From logo design to comprehensive brand systems, she crafts the details that make brands unforgettable.'],
            (object)['name' => 'Tom Harris', 'role' => 'Project Manager', 'photo' => '/images/team/tom.jpg', 'bio' => 'Tom keeps everything running smoothly. His obsession with timelines, budgets, and communication means projects are delivered on time, every time.'],
        ]);

        $awards = collect([
            (object)['name' => 'Awwwards — Site of the Day', 'year' => '2025', 'project' => 'Meridian Hotels'],
            (object)['name' => 'CSS Design Awards — Best UI', 'year' => '2025', 'project' => 'Volta Energy'],
            (object)['name' => 'Clutch — Top UK Web Agency', 'year' => '2024', 'project' => null],
            (object)['name' => 'DAN — Best Website Design', 'year' => '2024', 'project' => 'Aura Skincare'],
            (object)['name' => 'Awwwards — Honorable Mention', 'year' => '2024', 'project' => 'Kinetic Sports'],
            (object)['name' => 'FWA — Site of the Day', 'year' => '2023', 'project' => 'Nexus Finance'],
            (object)['name' => 'Great Place to Work — Certified', 'year' => '2023', 'project' => null],
        ]);

        $partners = collect([
            'Stripe', 'Shopify', 'WordPress', 'Google', 'Meta', 'HubSpot',
            'Mailchimp', 'Figma', 'Webflow', 'Cloudflare', 'AWS', 'Vercel',
            'Notion', 'Slack', 'Semrush',
        ]);

        $settings = (object)[
            'site_name' => 'DIVER.ENT',
            'mission' => 'We exist to make brands a damn site better.',
            'philosophy' => 'We believe that exceptional digital experiences are born from the intersection of bold creative thinking and rigorous strategic planning. Every project we take on is an opportunity to push boundaries, challenge conventions, and create something that truly matters.',
            'Linkedin' => 'Diver Ent Infinit',
            'phone' => '+44 (0) 20 7946 0958',
        ];

        return view('pages.agency', compact('teamMembers', 'awards', 'partners', 'settings'));
    }
}
