@extends('public.layouts.base')

@section('content')
    <section class="project-hero">
        <x-swiper.container
            id="project-gallery-carousel"
            class="project-gallery-carousel"
            :withPagination="true"
            :withNavigation="true"
        >
            @for ($i = 1; $i <= 6; $i++)
                <x-swiper.slide>
                    <img
                        {{-- @if ($i <= 2) src="/img/temp/project/{{ $i }}.webp"
                            @else
                                src="/img/default.svg"
                                data-src="/img/temp/project/{{ $i }}.webp" @endif --}}
                        src="/img/temp/project/{{ $i }}.webp"
                        alt="Image"
                        class="img-cover"
                    >
                </x-swiper.slide>
            @endfor
        </x-swiper.container>

        <div class="container project-hero-container">
            <nav class="breadcrumbs is-breadcrumbs-bg-dark project-hero-breadcrumbs">
                <ul>
                    <li><a href="{{ route('public.portfolio') }}">{{ __('base.portfolio') }}</a></li>
                    <li>{{ $project->title }}</li>
                </ul>
            </nav>

            <div class="project-hero-body">
                <h1 class="project-title">{{ $project->title }}</h1>

                {{-- <img
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
                > --}}

                <div class="project-hero-info">{{ $project->location }}</div>
            </div>
        </div>

        <x-public.icon.building-outline class="project-hero-icon" />
    </section>

    <section class="project-content">
        <div class="container project-content-container">
            <article class="formatted-text project-description">
                <div class="project-property-details">
                    <h2><strong>Property details</strong></h2>

                    <p class="project-property-details-item">
                        <span>PROPERTY TYPE</span>
                        <br>
                        <span class="h2"><strong>Single Family Home</strong></span>
                    </p>

                    <p class="project-property-details-item">
                        <span>STATUS</span>
                        <br>
                        <span class="h2"><strong>Available</strong></span>
                    </p>

                    <p class="project-property-details-item">
                        <span>YEAR BUILT</span>
                        <br>
                        <span class="h2"><strong>2008</strong></span>
                    </p>
                </div>

                {!! $project->description !!}
            </article>

            @if ($project->hasMedia($project->mediaFiles))
                <div class="project-files">
                    @foreach ($project->getMedia($project->mediaFiles) as $file)
                        <a
                            href="{{ $file->getUrl() }}"
                            class="project-file"
                            download="{{ $file->custom_properties['name'] }}"
                        >
                            <span class="project-file-name">{{ $file->custom_properties['name'] }}</span>
                            <span class="project-file-size">{{ number_format($file->size / (1024 * 1024), 2) }}
                                Mb</span>
                        </a>
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    @if ($projects->isNotEmpty())
        <section class="container other-projects">
            <div class="other-projects-head">
                <h3 class="other-projects-title">{{ __('public.other_cases') }}</h3>
                <a
                    href="{{ route('public.portfolio') }}"
                    class="home-portfolio-link"
                >{{ __('base.view_all') }}</a>
            </div>

            <div class="portfolio-projects-simple-cards">
                @foreach ($projects as $project)
                    @include('public.pages.portfolio.simple-card')
                @endforeach
            </div>
        </section>
    @endif
@endsection
