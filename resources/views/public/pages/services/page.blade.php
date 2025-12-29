@extends('public.layouts.base')

@section('content')
    <section class="container inner-page-head services-page-head">
        <h1 class="inner-page-title">{{ $page->title }}</h1>
    </section>

    @include('public.sections.services')

    @include('public.sections.contact-section')
@endsection
