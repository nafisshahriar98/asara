<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectFeature;
use App\Models\ProjectOverview;
use App\Models\ProjectGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of projects.
     */
    public function index()
    {
        $projects = Project::latest()->get();
        return view('backend.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new project.
     */
    public function create()
    {
        return view('backend.projects.create');
    }

    /**
     * Store a newly created project in storage.
     */
    public function store(Request $request)
    {
        // DEBUG (optional): comment out in production
        \Log::info('store incoming files', [
            'count' => is_array($request->file('gallery_images')) ? count($request->file('gallery_images')) : 0,
            'names' => collect($request->file('gallery_images', []))->map->getClientOriginalName(),
        ]);

        $request->validate([
            'title' => 'required|string|max:255',
            'banner_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'overview_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            // IMPORTANT: parent + child rules
            'gallery_images'   => 'nullable|array',
            'gallery_images.*' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            'project_stage' => 'required|in:ongoing,completed',
        ]);

        try {
            DB::transaction(function () use ($request) {

                // Step 1: Basic project info
                $data = $request->only(['title', 'banner_title', 'banner_subtitle', 'description', 'status']);
                $data['project_stage'] = $request->project_stage;

                // Slug + uniqueness (create)
                $base = Str::slug($request->title);
                $slug = $base; $k = 1;
                while (Project::where('slug', $slug)->exists()) {
                    $slug = $base . '-' . $k++;
                }
                $data['slug'] = $slug;

                // Step 2: File uploads
                if ($request->hasFile('banner_image')) {
                    $data['banner_image'] = $request->file('banner_image')->store('uploads/projects/banner', 'public');
                }
                if ($request->hasFile('overview_image')) {
                    $data['overview_image'] = $request->file('overview_image')->store('uploads/projects/overview', 'public');
                }

                // Step 3: Create main project
                $project = Project::create($data);

                // Step 4: Features
                if ($request->has('features')) {
                    foreach ($request->features as $feature) {
                        if (!empty($feature)) {
                            ProjectFeature::create([
                                'project_id' => $project->id,
                                'feature_text' => $feature,
                            ]);
                        }
                    }
                }

                // Step 5: Overview
                if ($request->has('overview_titles') && $request->has('overview_details')) {
                    foreach ($request->overview_titles as $index => $title) {
                        $detail = $request->overview_details[$index] ?? '';
                        if (!empty($title) && !empty($detail)) {
                            ProjectOverview::create([
                                'project_id' => $project->id,
                                'title' => $title,
                                'detail' => $detail,
                            ]);
                        }
                    }
                }

                // Step 6: Gallery (append on create)
                $files = $request->file('gallery_images', []);
                foreach ($files as $file) {
                    $path = $file->store('uploads/projects/gallery', 'public');
                    ProjectGallery::create([
                        'project_id' => $project->id,
                        'image_path' => $path,
                    ]);
                }
            });
        } catch (\Throwable $e) {
            \Log::error('store failed', ['msg' => $e->getMessage(), 'file' => $e->getFile(), 'line' => $e->getLine()]);
            return back()->with('error', 'Create failed: '.$e->getMessage())->withInput();
        }

        return redirect()->route('admin.projects.index')->with('success', 'Project created successfully!');
    }

    /**
     * Show the form for editing the specified project.
     */
    public function edit(Project $project)
    {
        return view('backend.projects.edit', compact('project'));
    }

    /**
     * Update the specified project.
     */
    public function update(Request $request, Project $project)
    {
        // DEBUG (optional): comment out in production
        \Log::info('update incoming files', [
            'count' => is_array($request->file('gallery_images')) ? count($request->file('gallery_images')) : 0,
            'names' => collect($request->file('gallery_images', []))->map->getClientOriginalName(),
        ]);

        $request->validate([
            'title' => 'required|string|max:255',
            'banner_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'overview_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            // IMPORTANT: parent + child rules
            'gallery_images'   => 'nullable|array',
            'gallery_images.*' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            'project_stage' => 'required|in:ongoing,completed',
        ]);

        try {
            DB::transaction(function () use ($request, $project) {

                // Step 1: base info
                $data = $request->only(['title', 'banner_title', 'banner_subtitle', 'description', 'status']);
                $data['project_stage'] = $request->project_stage;

                // Slug + uniqueness (exclude current record)
                $base = Str::slug($request->title);
                $slug = $base; $k = 1;
                while (Project::where('slug', $slug)->where('id', '!=', $project->id)->exists()) {
                    $slug = $base . '-' . $k++;
                }
                $data['slug'] = $slug;

                // Step 2: files
                if ($request->hasFile('banner_image')) {
                    if ($project->banner_image) {
                        Storage::disk('public')->delete($project->banner_image);
                    }
                    $data['banner_image'] = $request->file('banner_image')->store('uploads/projects/banner', 'public');
                }
                if ($request->hasFile('overview_image')) {
                    if ($project->overview_image) {
                        Storage::disk('public')->delete($project->overview_image);
                    }
                    $data['overview_image'] = $request->file('overview_image')->store('uploads/projects/overview', 'public');
                }

                $project->update($data);

                // Step 3: refresh relations
                $project->features()->delete();
                $project->overviews()->delete();

                if ($request->has('features')) {
                    foreach ($request->features as $feature) {
                        if (!empty($feature)) {
                            ProjectFeature::create([
                                'project_id' => $project->id,
                                'feature_text' => $feature,
                            ]);
                        }
                    }
                }

                if ($request->has('overview_titles') && $request->has('overview_details')) {
                    foreach ($request->overview_titles as $index => $title) {
                        $detail = $request->overview_details[$index] ?? '';
                        if (!empty($title) && !empty($detail)) {
                            ProjectOverview::create([
                                'project_id' => $project->id,
                                'title' => $title,
                                'detail' => $detail,
                            ]);
                        }
                    }
                }

                // Step 4: APPEND new gallery images (NO delete)
                $files = $request->file('gallery_images', []);
                foreach ($files as $file) {
                    $path = $file->store('uploads/projects/gallery', 'public');
                    ProjectGallery::create([
                        'project_id' => $project->id,
                        'image_path' => $path,
                    ]);
                }
            });
        } catch (\Throwable $e) {
            \Log::error('update failed', ['msg' => $e->getMessage(), 'file' => $e->getFile(), 'line' => $e->getLine()]);
            return back()->with('error', 'Update failed: '.$e->getMessage())->withInput();
        }

        return redirect()->route('admin.projects.index')->with('success', 'Project updated successfully!');
    }

    /**
     * Remove the specified project.
     */
    public function destroy(Project $project)
    {
        if ($project->banner_image) {
            Storage::disk('public')->delete($project->banner_image);
        }
        if ($project->overview_image) {
            Storage::disk('public')->delete($project->overview_image);
        }
        foreach ($project->galleries as $gallery) {
            Storage::disk('public')->delete($gallery->image_path);
        }

        $project->delete();

        return redirect()->back()->with('success', 'Project deleted successfully!');
    }

    /**
     * Delete a single gallery image from a project.
     */
    public function deleteGallery(Request $request, $id)
    {
        $gallery = ProjectGallery::find($id);
        if (!$gallery) {
            if ($request->wantsJson()) {
                return response()->json(['message' => 'Gallery not found'], 404);
            }
            return redirect()->back()->with('error', 'Gallery not found!');
        }

        if ($gallery->image_path && Storage::disk('public')->exists($gallery->image_path)) {
            Storage::disk('public')->delete($gallery->image_path);
        }

        $gallery->delete();

        if ($request->wantsJson()) {
            return response()->json(['message' => 'Deleted']);
        }

        return redirect()
            ->route('admin.projects.edit', $request->input('project_id', $gallery->project_id))
            ->with('success', 'Gallery image deleted successfully!');
    }
}
