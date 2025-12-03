@extends('public.layouts.base')

@section('content')
    <section class="container inner-page-head news-page-head">
        <h1 class="h3 inner-page-title">{{ __('base.news') }}</h1>

        <x-public.icon.building-outline class="news-page-head-icon"/>
    </section>

    <section class="news">
        <div class="container news-container">
            <x-public.news.categories :categories="$newsCategories"/>

            <div class="news-list">
                @foreach($newsArticles as $article)
                    <x-public.news.article-card :article="$article"/>
                @endforeach
            </div>

            <nav class="pagination">
                {{ $newsArticles->links('vendor.pagination.public') }}
            </nav>
        </div>
    </section>
@endsection
