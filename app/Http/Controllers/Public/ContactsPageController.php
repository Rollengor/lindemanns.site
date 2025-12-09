<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ContactsPageController extends Controller
{
    public function index(): View {
        return view('public.pages.contacts');
    }
}
