@extends('public.layouts.base')

@section('content')
    <section class="container inner-page-head portfolio-page-head">
        <h1 class="inner-page-title">{{ $page->title }}</h1>

        <x-public.icon.building-outline class="news-page-head-icon"/>
    </section>

    <section class="portfolio">
        <div id="portfolio" class="target-anchor-section"></div>

        <div class="container portfolio-container">
            <div class="portfolio-projects-simple-cards">
                @foreach($projects as $project)
                    @include('public.pages.portfolio.simple-card')
                @endforeach
            </div>

            <nav class="pagination news-pagination">{{ $projects->withQueryString()->links('vendor.pagination.public') }}</nav>
        </div>
    </section>
@endsection
