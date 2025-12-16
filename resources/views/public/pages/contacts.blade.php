@extends('public.layouts.base')

@section('content')
    <section class="container inner-page-head contacts-page-head">
        <h1 class="inner-page-title">{{ __('base.contacts') }}</h1>
    </section>

    <section class="contacts">
        <img src="/img/temp/contacts.webp" alt="Image" class="img-fluid contacts-bg-image">

        <div class="container contacts-container">
            <div class="contacts-links">
                <p><a href="tel:41796750423" class="base-link">+41 79 675 04 23</a></p>
                <p><a href="mailto:contact@tnduniverse.com" class="base-link">contact@tnduniverse.com</a></p>
            </div>

            <address>Zurich, Switzerland</address>

            <x-public.socials/>
        </div>
    </section>

    @include('public.sections.contact-section')
@endsection
