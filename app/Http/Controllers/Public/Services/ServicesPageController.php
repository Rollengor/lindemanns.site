<?php

namespace App\Http\Controllers\Public\Services;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\ServiceCategory;
use App\Models\SiteSection;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ServicesPageController extends Controller
{
    public function index(): View {
        $page = Page::where('slug', 'services')->first();
        $serviceCategories = ServiceCategory::whereHas('services', function ($query) {
            $query->where('active', 1);
        })->with(['services' => function ($query) {
            $query->where('active', 1)->orderByDesc('sort');
        }])->where('active', 1)->orderByDesc('sort')->get();
        $contactUsSection = SiteSection::where('slug', 'contact-us')->first();

        return view('public.pages.services.page', compact('page', 'serviceCategories', 'contactUsSection'));
    }
}
