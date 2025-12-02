<?php

namespace App\Http\Controllers\Public\News;

use App\Http\Controllers\Controller;
use App\Models\NewsArticle;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ArticlePageController extends Controller
{
    public function index(NewsArticle $newsArticle): View {

        $relatedArticles = NewsArticle::query()
            ->whereKeyNot($newsArticle->id)
            ->where('active', true)
            ->latest()
            ->limit(4)
            ->get();

        return view('public.pages.news.article', [
            'article' => $newsArticle,
            'relatedArticles' => $relatedArticles,
        ]);
    }
}
