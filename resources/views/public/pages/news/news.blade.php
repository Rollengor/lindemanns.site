@extends('public.layouts.base')

@section('content')
    <section class="container inner-page-head news-page-head">
        <h1 class="h3 inner-page-title">{{ __('base.news') }}</h1>

        <x-public.icon.building-outline class="news-page-head-icon"/>
    </section>

    <section class="news">
        <div class="container news-container">
            <x-public.news.tags/>

            <div class="news-list">
                @for($i = 0; $i < 15; $i++)
                    <x-public.news.article-card/>
                @endfor
            </div>

            <ul class="pagination">
                <li><a href="#" class="page-prev-link"></a></li>
                <li><a href="#" class="page-link is-active">1</a></li>
                <li><a href="#" class="page-link">2</a></li>
                <li><a href="#" class="page-link">3</a></li>
                <li><a href="#" class="page-link">4</a></li>
                <li><span class="dots">...</span></li>
                <li><a href="#" class="page-link">135</a></li>
                <li><a href="#" class="page-next-link"></a></li>
            </ul>
        </div>
    </section>
@endsection
