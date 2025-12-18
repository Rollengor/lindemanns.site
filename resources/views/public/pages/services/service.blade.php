@extends('public.layouts.base')

@section('content')
    <section class="container inner-page-head service-head">
        <h1 class="inner-page-title service-head-title">Searching and brokerage of real estate objects in Switzerland</h1>
        <p class="service-head-description">We are aware that you – as entrepreneur, investment fund, asset manager, bank or investor – consider optimized after-tax profit and after-tax performance as key factor for your success. You need to file tax declarations and other reporting duties on time and communicate successfully with tax authorities, e.g. in tax audits.</p>
    </section>

    <div class="container service-main-picture">
        <img src="/img/temp/service-main.webp" alt="picture" class="img-fluid">
    </div>

    <section class="container service-info">
        <h3 class="service-info-title">Our services comprise the following:</h3>

        <ul data-accordion class="service-info-list">
            @foreach($info as $item)
                <li data-accordion-item class="service-info-card">
                    <div data-accordion-target class="service-info-card-head">
                        <div class="service-info-card-head-icon"></div>
                        <div class="service-info-card-title">{{ $item['title'] }}</div>
                    </div>
                    <div data-accordion-content class="service-info-card-content">
                        <div class="service-info-card-description">
                            <p>{{ $item['description'] }}</p>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </section>

    @include('public.sections.contact-section')

    <div class="container service-more-info">
        <h3 class="service-more-info-title">Learn more about Tax regulations</h3>

        <div class="service-more-info-body">
            <div class="service-more-info-links">
                <a href="#">Tax Compliance</a>
                <a href="#">Tax for Asset Managers and Financial Service Providers</a>
                <a href="#">Tax for Corporate Clients</a>
                <a href="#">Tax for Private Clients</a>
            </div>

            <img src="/img/temp/service-info.webp" alt="image" class="img-cover service-more-info-image">
        </div>
    </div>
@endsection
