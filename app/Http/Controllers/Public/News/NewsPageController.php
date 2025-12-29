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

        $page = Page::where('slug', 'news')->first();
        $newsCategories = NewsCategory::where('active', '1')->get();
        $categoryId = data_get($data, 'category_id', 'all');
        $limitArticles = (int) data_get($data, 'limit_articles', 0);

        $query = NewsArticle::query()->where('active', '1')->latest()->with('categories');

        if ($categoryId !== 'all') {
            $query = $query->whereHas('categories', function ($query) use ($categoryId) {
                $query->where('news_categories.id', $categoryId);
            });
        }

        if ($limitArticles) {
            $newsArticles = $query->limit($limitArticles)->get();
        } else {
            $newsArticles = $query->paginate(12);
        }

        if($request->ajax()) {
            $listHtml = view('public.pages.news.list', compact('newsArticles'))->render();

            $responseData = [
                'success' => true,
                'category_id' => $categoryId,
                'articles_list_html' => $listHtml,
            ];

            if (!$limitArticles) {
                $paginationHtml = view('public.pages.news.pagination', compact('newsArticles'))->render();

                $responseData['pagination_html'] = $paginationHtml;
            }

            sleep(1);

            return response()->json($responseData);
        }

        return view('public.pages.news.page', compact('page', 'newsCategories', 'newsArticles'));
    }
}
