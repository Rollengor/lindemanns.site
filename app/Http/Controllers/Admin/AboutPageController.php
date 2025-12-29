<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AboutPageController extends Controller
{
    public function index(): View {
        $page = Page::where('slug', 'about')->first();

        return view('admin.about.index', compact('page'));
    }
}
