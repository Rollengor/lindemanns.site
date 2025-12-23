<?php

namespace App\Http\Controllers\Public\Portfolio;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProjectPageController extends Controller
{
    public function index(): View {
        return view('public.pages.portfolio.project');
    }
}
