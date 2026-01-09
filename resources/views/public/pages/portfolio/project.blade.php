@extends('public.layouts.base')

@section('content')
    <section class="project-hero">
        <div class="container project-hero-container">
            <nav class="breadcrumbs">
                <ul>
                    <li><a href="{{ route('public.portfolio') }}">{{ __('base.portfolio') }}</a></li>
                    <li>{{ $project->title }}</li>
                </ul>
            </nav>

            <div class="project-hero-body">
                <h1 class="project-title">{{ $project->title }}</h1>

                <img
                    @php
                        $heroImage = $project->hasMedia($project->mediaHero) ? $project->getFirstMedia($project->mediaHero) : '/img/default.svg';
                        $heroImageSizes = [
                            'md' => is_object($heroImage) ? $heroImage->getUrl('md-webp') : $heroImage,
                            'lg' => is_object($heroImage) ? $heroImage->getUrl('lg-webp') : $heroImage
                        ];
                    @endphp

                    srcset="
                        {{ $heroImageSizes['md'] }},
                        {{ $heroImageSizes['lg'] }} 1.5x,
                        {{ $heroImageSizes['lg'] }} 2x
                    "
                    src="{{ $heroImageSizes['lg'] }}"
                    alt="{{ $project->title }}"
                    class="img-cover project-hero-image"
                    loading="lazy"
                >

                <div class="project-hero-info">{{ $project->location }}</div>
            </div>
        </div>

        <x-public.icon.building-outline class="project-hero-icon"/>
    </section>

    <section class="project-content">
        <div class="container project-content-container">
            <article class="formatted-text project-description">{!! $project->description !!}</article>

            @if($project->hasMedia($project->mediaFiles))
                <div class="project-files">
                    @foreach($project->getMedia($project->mediaFiles) as $file)
                        <a href="{{ $file->getUrl() }}" class="project-file" download="{{ $file->custom_properties['name'] }}">
                            <span class="project-file-name">{{ $file->custom_properties['name'] }}</span>
                            <span class="project-file-size">{{ number_format($file->size / (1024 * 1024), 2) }} Mb</span>
                        </a>
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    @if($projects->isNotEmpty())
        <section class="container other-projects">
            <div class="other-projects-head">
                <h3 class="other-projects-title">{{ __('public.other_cases') }}</h3>
                <a href="{{ route('public.portfolio') }}" class="home-portfolio-link">{{ __('base.view_all') }}</a>
            </div>

            <div class="portfolio-projects-simple-cards">
                @foreach($projects as $project)
                    @include('public.pages.portfolio.simple-card')
                @endforeach
            </div>
        </section>
    @endif
@endsection
