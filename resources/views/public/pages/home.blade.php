@extends('public.layouts.base')

@section('content')
    <section class="home-hero bg-img-cover" style="background-image: url(/img/temp/hero.webp);">
        <div class="container home-hero-container">
            <h1>Lindemanns<br> Real</h1>

            <div class="home-hero-body">
                <img src="/img/circle-logo.svg" alt="Circle logo" class="img-fluid home-hero-logo">

                <div class="formatted-text home-hero-description">
                    <h4>Swis Excellence.<br> Global Perspective</h4>
                    <p>At LINDEMANNNS REAL GMBH, we transform real estate aspirations into tangible success. With unmatched expertise and a client-first approach, we are committed to helping you achieve your property goals.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="home-about">
        <div class="container home-about-container">
            <div class="home-about-title">{{ __('base.who_we_are') }}</div>

            <div class="home-about-content">
                <div class="formatted-text home-about-row">
                    <h4>Our Vision</h4>
                    <p>Our vision is to be a leading force in creating real estate opportunities that shape better communities and brighter futures.</p>
                </div>
                <div class="formatted-text home-about-row">
                    <h4>Our Mission</h4>
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
                <img src="/img/temp/service-1.webp" alt="Service image" class="img-cover home-services-row-image">
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
                <img src="/img/temp/service-2.webp" alt="Service image" class="img-cover home-services-row-image">
            </div>

            <div class="home-services-row">
                <div class="home-services-row-body">
                    <h3 class="home-services-row-title">Legal & Relocation Services</h3>
                    <ul>
                        <li><a href="#" class="primary-link">Legal structuring</a></li>
                        <li><a href="#" class="primary-link">Relocation to Switzerland</a></li>
                    </ul>
                </div>
                <img src="/img/temp/service-3.webp" alt="Service image" class="img-cover home-services-row-image">
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
