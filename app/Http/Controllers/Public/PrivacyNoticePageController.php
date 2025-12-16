<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PrivacyNoticePageController extends Controller
{
    public function index(): View {
        return view('public.pages.privacy-notice');
    }
}
