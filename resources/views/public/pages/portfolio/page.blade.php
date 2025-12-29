@extends('public.layouts.base')

@section('content')
    <section class="container inner-page-head portfolio-page-head">
        <h1 class="inner-page-title">{{ $page->title }}</h1>
    </section>

    <section class="portfolio">
        <div id="portfolio" class="target-anchor-section"></div>

        <div class="container portfolio-container">
            @include('public.sections.projects')

            <nav class="pagination news-pagination">{{ $projects->withQueryString()->links('vendor.pagination.public') }}</nav>
        </div>
    </section>
@endsection
