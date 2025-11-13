@extends('admin.layouts.base')

@section('title', __('titles.main') . ' - ' . config('app.name'))

@section('content')
    <div class="main-admin d-flex flex-column align-items-center m-auto w-100">
        <img src="/img/logo.svg" alt="Logo" class="img-fluid main-admin-logo">

        {{--<h1 class="text-center mt-5 main-admin-title mb-0 text-uppercase">{{ __('titles.adminPanel') }}</h1>--}}
    </div>
@endsection
