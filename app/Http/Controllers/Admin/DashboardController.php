<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use App\Models\Project;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProjects = Project::count();
        $activeProjects = Project::where('is_active', true)->count();
        $totalInquiries = Inquiry::count();
        $newInquiries = Inquiry::where('status', 'new')->count();
        $approvedInquiries = Inquiry::where('approval_status', 'approved')->count();
        $recentInquiries = Inquiry::with('project')->latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalProjects', 'activeProjects', 'totalInquiries',
            'newInquiries', 'approvedInquiries', 'recentInquiries'
        ));
    }
}
