<?php

namespace App\Http\Controllers\Public\News;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ArticlePageController extends Controller
{
    public function index(): View {
        return view('public.pages.news.article');
    }
}
