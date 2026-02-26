@extends('admin.layouts.auth')

@section('content')
    <div
        data-overlayscrollbars-initialize
        class="w-100 h-100"
    >
        <div class="d-flex flex-column h-100">
            <div class="p-3 my-auto">
                <form
                    action="{{ route('password.store') }}"
                    method="POST"
                    class="rounded border border-dark border-opacity-25 col-12 col-xs-9 col-sm-7 col-md-5 col-xl-4 col-hd-3 mx-auto shadow-fill"
                >
                    @csrf
                    @method('POST')

                    <!-- heading -->
                    <div class="p-3 border-bottom border-dark border-opacity-25 text-center">
                        <h1 class="fs-4 m-0 lh-sm text-uppercase">{{ __('admin.reset_password') }}</h1>
                        <div class="fs-5 text-gray">{{ config('app.name') }}</div>
                    </div>

                    <!-- fields -->
                    <div class="d-flex flex-column gap-4 py-4 px-3 px-xs-4">
                        <!-- token -->
                        <x-admin.field.hidden
                            :name="'token'"
                            :value="$request->route('token')"
                        />

                        <!-- email -->
                        <x-admin.field.email
                            :name="'email'"
                            :value="old('email', $request->email)"
                            :placeholder="__('admin.email')"
                        />

                        <!-- password -->
                        <x-admin.field.password
                            :name="'password'"
                            :value="old('password')"
                            :placeholder="__('admin.password')"
                        />

                        <!-- confirm password -->
                        <x-admin.field.password
                            :name="'password_confirmation'"
                            :value="old('password_confirmation')"
                            :placeholder="__('admin.repeat_password')"
                        />
                    </div>

                    <!-- errors -->
                    <x-admin.errors class="p-3 text-danger border-top border-dark border-opacity-25 text-center" />

                    <!-- actions -->
                    <div
                        class="d-flex flex-column align-items-center gap-2 p-3 pt-4 border-top border-dark border-opacity-25 text-center">
                        <button
                            type="submit"
                            class="btn btn-secondary px-3 submit-loader"
                        >
                            <span>{{ __('admin.reset_password') }}</span>

                            <span class="submit-loader-spinner">
                                <span class="spinner-border m-auto text-white"></span>
                            </span>
                        </button>

                        <a
                            href="{{ route('login') }}"
                            class="text-decoration-none"
                        >{{ __('texts.go_to_login') }}</a>

                        <x-admin.lang :withIcon="true" />
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
