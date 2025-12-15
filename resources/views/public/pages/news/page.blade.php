@extends('public.layouts.base')

@section('content')
    <section class="container inner-page-head news-page-head">
        <h1 class="inner-page-title">{{ __('base.news') }}</h1>

        <x-public.icon.building-outline class="news-page-head-icon"/>
    </section>

    <section class="news">
        <div id="news" class="target-anchor-section"></div>

        <div class="container news-container">
            <x-public.news.categories :categories="$newsCategories"/>

            <div id="news-list" class="news-list">
                @include('public.pages.news.list')
            </div>

            <nav id="news-pagination" data-update-list-id="news-list" data-anchor-section-id="news" class="pagination news-pagination">@include('public.pages.news.pagination')</nav>
        </div>
    </section>
@endsection
