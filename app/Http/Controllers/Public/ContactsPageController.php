<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\SiteSection;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ContactsPageController extends Controller
{
    public function index(): View {
        $page = Page::where('slug', 'contacts')->first();
        $contactUsSection = SiteSection::where('slug', 'contact-us')->first();

        return view('public.pages.contacts', compact('page', 'contactUsSection'));
    }
}
