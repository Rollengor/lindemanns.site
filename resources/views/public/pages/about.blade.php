@extends('public.layouts.base')

@section('content')

    <section class="container about-hero">
        <p class="about-hero-subtitle">{{ __('base.about') }}</p>
        <h1 class="about-hero-title">Expertise you trust success you deserve</h1>

        <div class="about-hero-picture">
            <img src="/img/temp/about.webp" alt="image" class="img-fluid">
            <img src="/img/circle-logo.svg" alt="logo" class="img-fluid about-hero-logo">
        </div>

        <p class="about-hero-description">Founded in 2025 in Zug, Switzerland. Expertise in real estate finance, and lwa. Sustainable, transparent, and client-focused service.</p>
    </section>

    @include('public.sections.who-we-are')

    <section class="container about-leaders">
        @foreach($leaders as $leader)
            <div class="leader-card">
                <div class="leader-card-picture">
                    <x-public.icon.building-outline/>
                    <img src="{{ $leader['image'] }}" alt="image" class="img-fluid leader-card-photo">
                </div>

                <div class="leader-card-body">
                    <h3 class="leader-card-name">{{ $leader['name'] }}</h3>
                    <div class="leader-card-position">{{ $leader['position'] }}</div>
                    <ul class="leader-card-info">
                        @foreach($leader['info'] as $item)
                            <li>
                                <p>{{ $item['head'] }}</p>
                                <p>{{ $item['value'] }}</p>
                            </li>
                        @endforeach
                    </ul>
                    <a href="#" class="primary-link leader-card-download-link">Download Resume</a>
                </div>
            </div>
        @endforeach
    </section>

    @include('public.sections.contact-section')
@endsection
