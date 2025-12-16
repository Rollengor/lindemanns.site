<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TermsOfUsePageController extends Controller
{
    public function index(): View {
        return view('public.pages.terms-of-use');
    }
}
