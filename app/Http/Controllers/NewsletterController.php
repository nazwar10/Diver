<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsletterRequest;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function index()
    {
        return view('pages.newsletter');
    }

    public function store(NewsletterRequest $request)
    {
        // In production: NewsletterSubscriber::create($request->validated());

        return redirect()->route('newsletter')
            ->with('success', 'You\'re in! Welcome to the DIVER.ENT newsletter.');
    }
}
