<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomePageController extends Controller
{
    public function index(): View {
        $page = Page::where('slug', 'home')->first();

        return view('public.pages.home', compact('page'));
    }
}
