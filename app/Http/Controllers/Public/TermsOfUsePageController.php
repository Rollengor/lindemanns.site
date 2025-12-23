<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TermsOfUsePageController extends Controller
{
    public function index(): View {
        $page = Page::where('slug', 'terms-of-use')->first();

        return view('public.pages.terms-of-use', compact('page'));
    }
}
