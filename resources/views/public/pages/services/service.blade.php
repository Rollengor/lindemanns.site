@extends('public.layouts.base')

@section('content')
    <section class="container inner-page-head service-head">
        <h1 class="inner-page-title service-head-title">Tax</h1>
        <p class="service-head-description">We are aware that you – as entrepreneur, investment fund, asset manager, bank or investor – consider optimized after-tax profit and after-tax performance as key factor for your success. You need to file tax declarations and other reporting duties on time and communicate successfully with tax authorities, e.g. in tax audits.</p>
    </section>

    <img src="/img/temp/service-main.webp" alt="picture" class="img-cover service-main-picture">

    <section class="container service-info">
        <h4 class="service-info-title">Our services comprise the following:</h4>

        <ul data-accordion class="service-info-list">
            @foreach($info as $item)
                <li data-accordion-item class="service-info-card">
                    <div data-accordion-target class="service-info-card-head">
                        <div class="service-info-card-head-icon"></div>
                        <div class="service-info-card-title">{{ $item['title'] }}</div>
                    </div>
                    <div data-accordion-content class="service-info-card-content">
                        <div class="service-info-card-body">
                            <div class="service-info-card-description">
                                <p>{{ $item['description'] }}</p>
                            </div>

                            <div class="service-info-card-picture">
                                <x-public.icon.building-outline/>
                                <img src="/img/circle-logo.svg" alt="logo" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </section>

    @include('public.sections.contact-section')

    <div class="container service-info-links">
        <a href="#" class="service-info-link">Tax Compliance</a>
        <a href="#" class="service-info-link">Tax for Asset Managers and Financial Service Providers</a>
        <a href="#" class="service-info-link">Tax for Corporate Clients</a>
        <a href="#" class="service-info-link">Tax for Private Clients</a>
    </div>
@endsection
