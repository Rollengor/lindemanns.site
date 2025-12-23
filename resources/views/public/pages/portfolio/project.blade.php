@extends('public.layouts.base')

@section('content')
    <section class="project-hero">
        <div class="container project-hero-container">
            <nav class="breadcrumbs">
                <ul>
                    <li><a href="{{ route('public.portfolio') }}">{{ __('base.portfolio') }}</a></li>
                    <li>Valuation of Land and Resience Block 4839B Parcel No 3994</li>
                </ul>
            </nav>

            <div class="project-hero-body">
                <h1 class="project-title">Valuation of Land and Resience Block 4839B Parcel No 3994</h1>

                <img src="/img/temp/project-8.webp" alt="image" class="img-cover project-hero-image">

                <div class="project-hero-info">Virgin Gorda South</div>
            </div>
        </div>

        <x-public.icon.building-outline class="project-hero-icon"/>
    </section>

    <section class="project-content">
        <div class="container project-content-container">
            <article class="formatted-text project-description">
                <h2><strong>Specifically- Virgin Gorda</strong></h2>
                <ul>
                    <li>Virgin Gorda is the third-largest and second most populated of the British Virgin Islands and is located to the east of Tortola approximately 30 minutes by ferry. It covers an area of approximately 8 square miles.</li>
                    <li>The capital and main town, - Spanish Town, the main harbor and principal commercial center in Virgin Gorda comprises banks, shopping centres, a marina, restaurants, guest houses and the main Ferry Terminal.</li>
                    <li>The buildings within town center were severely impacted by the hurricanes of 2017, including the Yacht Habour building, however many of the shops within the main complex been renovated and upgraded to provide more modern commercial space together with enhanced visitors’ experience.</li>
                    <li>Banking facilities have returned to the island and a number of the smaller commercial buildings have been repaired and are currently in operation. The neighbourhood lacks defined boundaries and are typically referred by names.</li>
                </ul>
                <figure>
                    <img src="/img/temp/project-gallery.webp" alt="image">
                </figure>
                <h4>The subject property is located in the Princess Quarters area, an extension to the Windy Hill community along the south-eastern side of the tertiary access road <span style="color: #919CA8;">which connects with Rhymers Road to the west</span>.</h4>
                <figure>
                    <picture>
                        <img src="/img/temp/project-article.webp" alt="image">
                    </picture>
                    <figcaption><div>SEO freelancers from Fiverr (Source: <a href="#" target="_blank">Fiverr</a>)</div></figcaption>
                </figure>
                <p>Approximately 5-8 minutes’ drive from the Ferry Terminal in Spanish Town, the Red Rock Villa and Spa is situated in a secluded neighbourhood along the eastern end of a cul-de-sac access.</p>
                <p>The property sits on a gentle sloping gradient along the ridge, which allows views of South Sound side of Virgin Gorda, the Dogs through to Tortola situated directly north.</p>
                <h2><strong>Highest and best use</strong></h2>
                <p>Currently there are no zoning restrictions imposed on development in the BVI. However, development in the territory is based on the decisions imposed by the Town and Country Planning Department and Building Authority guided by the Physical Planning Act 2004 and The Land Development Control Guidelines 1972.</p>
                <ul>
                    <li>Based on the location, terrain, density, physical characteristics and the proximity to neighbouring buildings and uses; the lands would be ideal for residential development.</li>
                    <li>The residences are generally in the high-end/luxury bracket and comprises mostly single-family residence /leisure or villa type. The subject property is consistent with the design features exhibited by the neighbouring properties and appears to be in compliance of the necessary building regulations.</li>
                    <li>In our opinion, the highest and best use of the subject property is that of its existing use, which is residential/leisure property.</li>
                </ul>
            </article>

            <div class="project-files">
                <a href="#" class="project-file">
                    <span class="project-file-name">PDF Presentation</span>
                    <span class="project-file-size">5.32 Mb</span>
                </a>
                <a href="#" class="project-file">
                    <span class="project-file-name">Agreement Licence (DEMO)</span>
                    <span class="project-file-size">4.88 Mb</span>
                </a>
                <a href="#" class="project-file">
                    <span class="project-file-name">Document Name</span>
                    <span class="project-file-size">1.32 Mb</span>
                </a>
            </div>
        </div>
    </section>

    <section class="container other-projects">
        <div class="other-projects-head">
            <h3 class="other-projects-title">Other cases</h3>
            <a href="{{ route('public.portfolio') }}" class="home-portfolio-link">{{ __('base.view_all') }}</a>
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
                        <a href="{{ route('public.portfolio.project') }}" class="project-card-link"></a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection
