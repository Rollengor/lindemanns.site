@extends('admin.layouts.auth')

{{--@section('title', '')
@section('description', '')--}}

@section('content')
    <div data-overlayscrollbars-initialize class="w-100 h-100">
        <div class="d-flex flex-column h-100">
            <div class="p-3 my-auto">
                <form action="{{ route('login') }}" method="POST" class="rounded border border-dark border-opacity-25 col-12 col-xs-8 col-sm-6 col-md-4 col-xl-3 col-hd-2 mx-auto shadow-fill">
                    @csrf
                    @method('POST')

                    <!-- heading -->
                    <div class="p-3 border-bottom border-dark border-opacity-25 text-center">
                        <h1 class="fs-4 m-0 lh-sm text-uppercase">{{ __('titles.adminPanel') }}</h1>
                        <div class="fs-5 text-gray">{{ config('app.name') }}</div>
                    </div>

                    <!-- fields -->
                    <div class="d-flex flex-column gap-4 py-4 px-3 px-xs-4">
                        <!-- username -->
                        <x-admin.field.text
                            :name="'username'"
                            :value="old('username')"
                            :placeholder="__('fields.usernameOrEmail')"
                            :pattern="'.{4,}'"
                        />

                        <!-- password -->
                        <x-admin.field.password
                            :name="'password'"
                            :value="old('password')"
                            :placeholder="__('fields.password')"
                        />

                        <!-- remember -->
                        <x-admin.field.checkbox
                            class="m-0"

                            :name="'remember'"
                            :value="1"
                            :title="__('fields.rememberMe')"
                            :required="false"
                        />
                    </div>

                    <!-- status -->
                    @if (session('status'))
                        <div class="p-3 text-success border-top border-dark border-opacity-25 text-center">
                            <div>{{ session('status') }}</div>
                        </div>
                    @endif

                    <!-- errors -->
                    <x-admin.errors class="p-3 text-danger border-top border-dark border-opacity-25 text-center" />

                    <!-- actions -->
                    <div class="d-flex flex-column align-items-center gap-2 p-3 pt-4 border-top border-dark border-opacity-25 text-center">
                        <button type="submit" class="btn btn-secondary px-5 submit-loader">
                            <span>{{ __('buttons.logIn') }}</span>

                            <span class="submit-loader-spinner">
                                <span class="spinner-border m-auto text-white"></span>
                            </span>
                        </button>

                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-decoration-none">{{ __('texts.forgotYourPassword') }}</a>
                        @endif

                        <x-admin.lang :withIcon="true" />
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
