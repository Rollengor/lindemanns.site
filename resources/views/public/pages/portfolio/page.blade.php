@extends('public.layouts.base')

@section('content')
    <section class="container inner-page-head portfolio-page-head">
        <h1 class="inner-page-title">{{ __('base.portfolio') }}</h1>
    </section>

    <section class="portfolio">
        <div id="portfolio" class="target-anchor-section"></div>

        <div class="container portfolio-container">
            <div class="home-portfolio-projects">
                @foreach($projects as $project)
                    <div class="bg-img-cover project-card" style="background-image: url({{ $project['image'] }});">
                        <div class="project-card-content">
                            <h5 class="project-card-title">{{ $project['title'] }}</h5>
                            <div class="project-card-description">
                                <p>{{ $project['description'] }}</p>
                            </div>
                            <div class="project-card-tags">
                                @foreach($project['categories'] as $category)
                                    <p>{{ $category }}</p>
                                @endforeach
                            </div>
                            <a href="#" class="project-card-link"></a>
                        </div>
                    </div>
                @endforeach
            </div>

            @include('public.fragments.pagination')
        </div>
    </section>
@endsection
