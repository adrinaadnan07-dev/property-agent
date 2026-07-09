<?php

namespace App\Http\Controllers;

use App\Models\Project;

class ProjectController extends Controller
{
    public function newProjects()
    {
        $projects = Project::where('is_active', true)
            ->where('type', 'new_project')
            ->latest()
            ->paginate(12);

        return view('projects.new-projects', compact('projects'));
    }

    public function landedProperties()
    {
        $projects = Project::where('is_active', true)
            ->where('type', 'landed')
            ->latest()
            ->paginate(12);

        return view('projects.landed-properties', compact('projects'));
    }

    public function show($slug)
    {
        $project = Project::where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        $relatedProjects = Project::where('is_active', true)
            ->where('type', $project->type)
            ->where('id', '!=', $project->id)
            ->latest()
            ->take(3)
            ->get();

        return view('projects.show', compact('project', 'relatedProjects'));
    }
}
