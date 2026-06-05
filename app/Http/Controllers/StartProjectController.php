<?php

namespace App\Http\Controllers;

use App\Http\Requests\StartProjectRequest;
use Illuminate\Http\Request;

class StartProjectController extends Controller
{
    public function index()
    {
        return view('pages.start-your-project');
    }

    public function store(StartProjectRequest $request)
    {
        // In production, this would save to ConsultationLead model
        // ConsultationLead::create($request->validated());

        // For now, we'll flash a success message
        return redirect()->route('start-project')
            ->with('success', 'Thank you! We\'ve received your project brief and will be in touch within 24 hours.');
    }
}
