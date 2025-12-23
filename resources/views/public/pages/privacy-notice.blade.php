@extends('public.layouts.base')

@section('content')
    <section class="container inner-page-head is-text-left">
        <h1 class="inner-page-title">{{ $page->title }}</h1>
    </section>

    <section class="container formatted-text inner-page-content">{!! $page->description !!}</section>

    @include('public.sections.contact-section')
@endsection
