<?php

namespace App\Http\Controllers;

use App\Models\Project;

class HomeController extends Controller
{
    public function index()
    {
        $featuredProjects = Project::where('is_active', true)
            ->where('is_featured', true)
            ->latest()
            ->take(6)
            ->get();

        $newProjects = Project::where('is_active', true)
            ->where('type', 'new_project')
            ->latest()
            ->take(3)
            ->get();

        $landedProjects = Project::where('is_active', true)
            ->where('type', 'landed')
            ->latest()
            ->take(3)
            ->get();

        return view('home', compact('featuredProjects', 'newProjects', 'landedProjects'));
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }
}
