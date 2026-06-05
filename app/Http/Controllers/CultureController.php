<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CultureController extends Controller
{
    public function index()
    {
        $teamMembers = collect([
            (object)['name' => 'Marcus Webb', 'role' => 'Creative Director & Founder', 'photo' => '/images/team/marcus.jpg'],
            (object)['name' => 'Alex Turner', 'role' => 'Lead Designer', 'photo' => '/images/team/alex.jpg'],
            (object)['name' => 'Priya Sharma', 'role' => 'Head of Strategy', 'photo' => '/images/team/priya.jpg'],
            (object)['name' => 'James O\'Brien', 'role' => 'Technical Director', 'photo' => '/images/team/james.jpg'],
            (object)['name' => 'Sofia Andersson', 'role' => 'Senior Developer', 'photo' => '/images/team/sofia.jpg'],
            (object)['name' => 'David Kim', 'role' => 'Digital Marketing Manager', 'photo' => '/images/team/david.jpg'],
            (object)['name' => 'Lena Rossi', 'role' => 'Brand Designer', 'photo' => '/images/team/lena.jpg'],
            (object)['name' => 'Tom Harris', 'role' => 'Project Manager', 'photo' => '/images/team/tom.jpg'],
        ]);

        $values = collect([
            (object)['title' => 'Craft Over Convention', 'description' => 'We choose the thoughtful path over the easy one. Every detail matters, and we\'d rather spend an extra day perfecting something than shipping something ordinary.'],
            (object)['title' => 'Radical Candour', 'description' => 'We tell clients what they need to hear, not what they want to hear. Honest, respectful communication is the foundation of great work.'],
            (object)['title' => 'Continuous Learning', 'description' => 'The digital landscape never stops evolving, and neither do we. We invest in our team\'s growth through courses, conferences, and experimentation time.'],
            (object)['title' => 'Work-Life Integration', 'description' => 'We believe great work comes from fulfilled people. Flexible hours, remote options, and a genuine respect for life outside of work.'],
        ]);

        $perks = collect([
            '4-day work week option', 'Remote-first flexibility', 'Annual learning budget',
            'Team retreats twice a year', 'Mental health support', 'Latest equipment provided',
            'Friday afternoon socials', 'Unlimited book allowance',
        ]);

        $settings = (object)[
            'site_name' => 'DIVER.ENT',
            'culture_headline' => 'Where great people do great work.',
            'culture_description' => 'We\'ve built a studio culture that attracts the best talent and brings out their best work. Certified as a Great Place to Work, we\'re proud of the environment we\'ve created.',
        ];

        return view('pages.culture', compact('teamMembers', 'values', 'perks', 'settings'));
    }
}
