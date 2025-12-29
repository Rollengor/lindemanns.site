<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Leader;
use App\Models\Page;
use App\Models\SiteSection;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AboutPageController extends Controller
{
    public function index(): View {
        $page = Page::where('slug', 'about')->first();
        $leaders = Leader::where('active', 1)->orderByDesc('sort')->get();
        $whoWeAreSection = SiteSection::where('slug', 'who-we-are')->first();
        $contactUsSection = SiteSection::where('slug', 'contact-us')->first();

        return view('public.pages.about', compact('page', 'leaders', 'whoWeAreSection', 'contactUsSection'));
    }
}
