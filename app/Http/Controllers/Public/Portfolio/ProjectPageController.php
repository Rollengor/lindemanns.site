<?php

namespace App\Http\Controllers\Public\Portfolio;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProjectPageController extends Controller
{
    public function index(Project $project): View {
        $page = $project;
        $projects = Project::where('id', '!=', $project->id)
        ->where('active', 1)
        ->latest()
        ->orderByDesc('sort')
        ->take(4)
        ->get();

        return view('public.pages.portfolio.project', compact('page', 'project', 'projects'));
    }
}
