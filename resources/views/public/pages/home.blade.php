@extends('public.layouts.base')

@section('content')
    <section class="home-hero bg-img-cover" style="background-image: url({{ $page->getFirstMediaUrl('hero-image', 'hd-webp') }});">
        <div class="container home-hero-container">
            <h1>{{ data_get($page->content_data, 'hero.title') }}</h1>

            <div class="home-hero-body">
                <x-public.circle-logo class="home-hero-logo"/>

                <div class="formatted-text home-hero-description">{!! data_get($page->content_data, 'hero.description') !!}</div>
            </div>
        </div>
    </section>

    <section class="home-about">
        <div class="container home-about-container">
            <div class="home-about-pictures">
                <img src="/img/temp/home-about-4.webp" alt="Image" class="img-cover home-about-image">
                <img src="/img/temp/home-about-3.webp" alt="Image" class="img-cover home-about-image">
                <img src="/img/temp/home-about-5.webp" alt="Image" class="img-cover home-about-image">
            </div>

            <div class="home-about-body">
                <h6 class="home-about-title">{{ __('base.who_we_are') }}</h6>

                <div class="formatted-text home-about-description">
                    <h2>Our Vision</h2>
                    <p>Our vision is to be a leading force in creating real estate opportunities that shape better communities and brighter futures.</p>
                </div>

                <div class="formatted-text home-about-description">
                    <h2>Our Mission</h2>
                    <p>To deliver exceptional real estate services through innovation, professionalism, and a commitment to understanding our clients’ unique needs.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="home-services">
        <div class="container home-services-container">
            <div class="home-services-row">
                <div class="home-services-row-body">
                    <h3 class="home-services-row-title">Real Estate Services</h3>
                    <ul>
                        <li><a href="#" class="primary-link">Searching and brokerage of real estate objects in Switzerland</a></li>
                        <li><a href="#" class="primary-link">Planning of real estate</a></li>
                        <li><a href="#" class="primary-link">Development of real estate</a></li>
                        <li><a href="#" class="primary-link">Marketing of real estate</a></li>
                        <li><a href="#" class="primary-link">Brokerage</a></li>
                        <li><a href="#" class="primary-link">Property management</a></li>
                        <li><a href="#" class="primary-link">Renovation</a></li>
                    </ul>
                </div>
                <div class="home-services-row-pictures">
                    <img src="/img/temp/home-about-1.webp" alt="Image" class="img-cover home-services-row-image-back">
                    <img src="/img/temp/home-about-2.webp" alt="Image" class="img-cover home-services-row-image-front">
                </div>
                {{--<img src="/img/temp/service-1.webp?v-2" alt="Service image" class="img home-services-row-image">--}}
            </div>

            <div class="home-services-row">
                <div class="home-services-row-body">
                    <h3 class="home-services-row-title">Financial & Investment Advisory</h3>
                    <ul>
                        <li><a href="#" class="primary-link">Corporate finance advisory for real estate projects</a></li>
                        <li><a href="#" class="primary-link">Investment consulting</a></li>
                        <li><a href="#" class="primary-link">Tax</a></li>
                        <li><a href="#" class="primary-link">Wealth protection</a></li>
                    </ul>
                </div>
                <img src="/img/temp/service-2.webp?v-2" alt="Service image" class="img home-services-row-image">
            </div>

            <div class="home-services-row">
                <div class="home-services-row-body">
                    <h3 class="home-services-row-title">Legal & Relocation Services</h3>
                    <ul>
                        <li><a href="#" class="primary-link">Legal structuring</a></li>
                        <li><a href="#" class="primary-link">Relocation to Switzerland</a></li>
                    </ul>
                </div>
                <img src="/img/temp/service-3.webp?v-2" alt="Service image" class="img home-services-row-image">
            </div>
        </div>
    </section>

    <section class="home-portfolio">
        <div class="container home-portfolio-container">
            <div class="home-portfolio-head">
                <div class="home-portfolio-subtitle">{{ __('base.portfolio') }}</div>
                <h2 class="home-portfolio-title">{{ __('base.recent_cases') }}</h2>
                <a href="#" class="home-portfolio-link">{{ __('base.view_all') }}</a>
            </div>

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
        </div>
    </section>

    @include('public.sections.news')
    @include('public.sections.contact-section')
@endsection
