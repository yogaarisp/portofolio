<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Experience;
use App\Models\Setting;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'projects' => Project::count(),
            'skills' => Skill::distinct('category')->count('category'),
            'experiences' => Experience::count(),
        ];
        
        $projects = Project::latest()->take(3)->get();
        
        return view('admin.dashboard', compact('stats', 'projects'));
    }

    public function projects()
    {
        return view('admin.projects.index');
    }

    public function skills()
    {
        return view('admin.skills.index');
    }

    public function experiences()
    {
        return view('admin.experiences.index');
    }

    public function settings()
    {
        return view('admin.settings.index');
    }
}
