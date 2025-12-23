<?php

namespace App\Http\Controllers\Admin\Portfolio;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Project;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProjectController extends Controller
{
    public function index(): View {
        $projects = Project::latest()->get();

        return view('admin.portfolio.projects.index', compact('projects'));
    }

    public function create(Request $request): View|JsonResponse|string {
        if ($request->ajax()) {
            return view('admin.portfolio.projects.create')->render();
        }

        abort(404);
    }
}
