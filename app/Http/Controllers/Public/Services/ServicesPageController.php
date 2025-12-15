<?php

namespace App\Http\Controllers\Public\Services;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ServicesPageController extends Controller
{
    public function index(): View {
        return view('public.pages.services.page');
    }
}
