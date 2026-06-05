<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $settings = (object)[
            'site_name' => 'DIVER.ENT',
            'email' => 'hello@diver-ent.com',
            'phone' => '+44 (0) 20 7946 0958',
            'address' => '42 Shoreditch High Street, London, E1 6JJ',
            'social' => (object)[
                'instagram' => 'https://instagram.com/diverent',
                'linkedin' => 'https://linkedin.com/company/diverent',
                'twitter' => 'https://twitter.com/diverent',
                'dribbble' => 'https://dribbble.com/diverent',
            ],
        ];

        return view('pages.contact', compact('settings'));
    }
}
