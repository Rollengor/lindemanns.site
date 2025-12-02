<?php

namespace App\Http\Controllers\Public\News;

use App\Http\Controllers\Controller;
use App\Models\NewsArticle;
use App\Models\NewsCategory;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\View\View;

class NewsPageController extends Controller
{
    public function index(): View {
        $newsCategories = NewsCategory::where('active', '1')->get();
        $newsArticles = NewsArticle::where('active', '1')->latest()->limit(12)->get();

        return view('public.pages.news.news', compact('newsCategories', 'newsArticles'));
    }
}
