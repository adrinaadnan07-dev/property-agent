<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->paginate(15);
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|in:new_project,landed',
            'price' => 'required|numeric|min:0',
            'location' => 'required|string|max:255',
            'developer' => 'nullable|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|string|max:255',
            'features' => 'nullable|array',
            'size_sqft' => 'nullable|string|max:50',
            'bedrooms' => 'nullable|integer|min:0',
            'bathrooms' => 'nullable|integer|min:0',
            'tenure' => 'nullable|string|max:100',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
            'whatsapp_group_link' => 'nullable|url',
            'telegram_channel' => 'nullable|url',
            'registration_link' => 'nullable|url',
        ]);

        $validated['slug'] = Str::slug($validated['title']);
        $validated['is_featured'] = $request->has('is_featured');
        $validated['is_active'] = $request->has('is_active');

        Project::create($validated);

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project created successfully.');
    }

    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|in:new_project,landed',
            'price' => 'required|numeric|min:0',
            'location' => 'required|string|max:255',
            'developer' => 'nullable|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|string|max:255',
            'features' => 'nullable|array',
            'size_sqft' => 'nullable|string|max:50',
            'bedrooms' => 'nullable|integer|min:0',
            'bathrooms' => 'nullable|integer|min:0',
            'tenure' => 'nullable|string|max:100',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
            'whatsapp_group_link' => 'nullable|url',
            'telegram_channel' => 'nullable|url',
            'registration_link' => 'nullable|url',
        ]);

        $validated['slug'] = Str::slug($validated['title']);
        $validated['is_featured'] = $request->has('is_featured');
        $validated['is_active'] = $request->has('is_active');

        $project->update($validated);

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project updated successfully.');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index')
            ->with('success', 'Project deleted successfully.');
    }
}
