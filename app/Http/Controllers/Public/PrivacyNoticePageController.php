<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PrivacyNoticePageController extends Controller
{
    public function index(): View {
        $page = Page::where('slug', 'privacy-notice')->first();

        return view('public.pages.privacy-notice', compact('page'));
    }
}
