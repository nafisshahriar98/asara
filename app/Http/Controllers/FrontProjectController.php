<?php

// app/Http/Controllers/FrontProjectController.php
namespace App\Http\Controllers;

use App\Models\Project;

class FrontProjectController extends Controller
{
    public function index()
    {
        
        $projects = Project::query()
            ->where('status', 'active')                 // optional
            ->latest()
            ->with(['galleries:id,project_id,image_path'])
            ->select('id','title','slug','banner_image','overview_image','project_stage','description','status')
            ->paginate(9);                               // change per-page if you want

        return view('projects', compact('projects'));    // ← matches your current view name
    }

    public function show($slug)
    {
        $project = Project::where('slug', $slug)
            ->with(['features','overviews','overview_image','galleries'])
            ->firstOrFail();

        // return view('project-details', compact('project')); // keep your existing details view
        return view('project-details-testing', compact('project')); // keep your existing details view
    }
}
