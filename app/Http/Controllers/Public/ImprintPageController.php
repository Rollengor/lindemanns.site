<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ImprintPageController extends Controller
{
    public function index(): View {
        return view('public.pages.imprint');
    }
}
