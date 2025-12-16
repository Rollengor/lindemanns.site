@extends('public.layouts.base')

@section('content')
    <section class="container inner-page-head services-page-head">
        <h1 class="inner-page-title">Areas of expertise</h1>
    </section>

    <section class="services">
        <div class="container services-container">
            <div class="services-row">
                <div class="services-row-body">
                    <h3 class="services-row-title">Real Estate Services</h3>
                    <ul>
                        <li><a href="{{ route('public.services.article') }}" class="primary-link">Searching and brokerage of real estate objects in Switzerland</a></li>
                        <li><a href="{{ route('public.services.article') }}" class="primary-link">Planning of real estate</a></li>
                        <li><a href="{{ route('public.services.article') }}" class="primary-link">Development of real estate</a></li>
                        <li><a href="{{ route('public.services.article') }}" class="primary-link">Marketing of real estate</a></li>
                        <li><a href="{{ route('public.services.article') }}" class="primary-link">Brokerage</a></li>
                        <li><a href="{{ route('public.services.article') }}" class="primary-link">Property management</a></li>
                        <li><a href="{{ route('public.services.article') }}" class="primary-link">Renovation</a></li>
                    </ul>
                </div>
                {{--<div class="services-row-pictures">
                    <img src="/img/temp/home-about-1.webp" alt="Image" class="img-cover services-row-image-back">
                    <img src="/img/temp/home-about-2.webp" alt="Image" class="img-cover services-row-image-front">
                </div>--}}
                <img src="/img/temp/service-4.webp?v-2" alt="Service image" class="img services-row-image">
            </div>

            <div class="services-row">
                <div class="services-row-body">
                    <h3 class="services-row-title">Financial & Investment Advisory</h3>
                    <ul>
                        <li><a href="{{ route('public.services.article') }}" class="primary-link">Corporate finance advisory for real estate projects</a></li>
                        <li><a href="{{ route('public.services.article') }}" class="primary-link">Investment consulting</a></li>
                        <li><a href="{{ route('public.services.article') }}" class="primary-link">Tax</a></li>
                        <li><a href="{{ route('public.services.article') }}" class="primary-link">Wealth protection</a></li>
                    </ul>
                </div>
                <img src="/img/temp/service-5.webp?v-2" alt="Service image" class="img services-row-image">
            </div>

            <div class="services-row">
                <div class="services-row-body">
                    <h3 class="services-row-title">Legal & Relocation Services</h3>
                    <ul>
                        <li><a href="{{ route('public.services.article') }}" class="primary-link">Legal structuring</a></li>
                        <li><a href="{{ route('public.services.article') }}" class="primary-link">Relocation to Switzerland</a></li>
                    </ul>
                </div>
                <img src="/img/temp/service-3.webp?v-2" alt="Service image" class="img services-row-image">
            </div>
        </div>
    </section>

    @include('public.sections.contact-section')
@endsection
