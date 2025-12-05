<?php

namespace App\Http\Controllers\Public\News;

use App\Http\Controllers\Controller;
use App\Http\Requests\Public\News\UpdateRequest;
use App\Models\NewsArticle;
use App\Models\NewsCategory;
use App\Models\Page;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class NewsPageController extends Controller
{
    public function index(UpdateRequest $request): View|JsonResponse {
        $data = $request->validated();

        $newsCategories = NewsCategory::where('active', '1')->get();
        $categoryId = data_get($data, 'category_id', 'all');

        $query = NewsArticle::query()->where('active', '1')->with('categories');

        if ($categoryId !== 'all') {
            $query = $query->whereHas('categories', function ($query) use ($categoryId) {
                $query->where('news_categories.id', $categoryId);
            });
        }

        $newsArticles = $query->latest()->paginate(12);

        if($request->ajax()) {
            $listHtml = view('public.pages.news.list', compact('newsArticles'))->render();
            $paginationHtml = view('public.pages.news.pagination', compact('newsArticles'))->render();

            sleep(1);

            return response()->json([
                'success' => true,
                'articles_list_html' => $listHtml,
                'pagination_html' => $paginationHtml,
                'category_id' => $categoryId,
            ]);
        }

        return view('public.pages.news.news', compact('newsCategories', 'newsArticles'));
    }
}
