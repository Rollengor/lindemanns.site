@extends('admin.layouts.auth')

@section('title', 'Register - ' . config('app.name'))

@section('content')
    <div data-overlayscrollbars-initialize class="w-100 h-100">
        <div class="d-flex flex-column h-100">
            <div class="p-3 my-auto">
                <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data" class="rounded border border-dark border-opacity-25 col-12 col-sm-10 col-md-8 col-xl-5 col-hd-4 mx-auto shadow-fill">
                    @csrf
                    @method('POST')

                    <!-- heading -->
                    <div class="p-3 border-bottom border-dark border-opacity-25 text-center">
                        <h1 class="fs-4 m-0 lh-sm text-uppercase">{{ __('titles.registration') }}</h1>
                        <div class="fs-5 text-gray">{{ config('app.name') }}</div>
                    </div>

                    <!-- fields -->
                    <div class="d-flex flex-column gap-4 py-4 px-3 px-xs-4">
                        <div class="d-flex flex-row gap-3 gap-xs-4">
                            <!-- avatar -->
                            <x-admin.field.image
                                style="width: 108px;"

                                :name="'avatar'"
                                :placeholder="__('fields.avatar')"
                                :ratio="'1x1'"
                                :rounded="'rounded-circle'"
                                :required="false"
                            />

                            <div class="d-flex flex-column gap-4 flex-auto">
                                <!-- first name -->
                                <x-admin.field.text
                                    :name="'first_name'"
                                    :value="old('first_name')"
                                    :placeholder="__('fields.firstName')"
                                />

                                <!-- last name -->
                                <x-admin.field.text
                                    :name="'last_name'"
                                    :value="old('last_name')"
                                    :placeholder="__('fields.lastName')"
                                />
                            </div>
                        </div>

                        <div class="d-flex flex-column flex-sm-row gap-4">
                            <!-- username -->
                            <x-admin.field.text
                                class="flex-auto"

                                :name="'username'"
                                :value="old('username')"
                                :placeholder="__('fields.username')"
                                :pattern="'.{4,}'"
                            />

                            <!-- email -->
                            <x-admin.field.email
                                class="flex-auto"

                                :name="'email'"
                                :value="old('email')"
                                :placeholder="__('fields.email')"
                            />
                        </div>

                        <div class="d-flex flex-column flex-md-row gap-4">
                            <!-- password -->
                            <x-admin.field.password
                                class="flex-auto"

                                :name="'password'"
                                :value="old('password')"
                                :placeholder="__('fields.password')"
                            />

                            <!-- confirm password -->
                            <x-admin.field.password
                                class="flex-auto"

                                :name="'password_confirmation'"
                                :value="old('password_confirmation')"
                                :placeholder="__('fields.repeatPassword')"
                            />
                        </div>
                    </div>

                    <!-- errors -->
                    <x-admin.errors class="p-3 text-danger border-top border-dark border-opacity-25 text-center" />

                    <!-- actions -->
                    <div class="d-flex flex-column align-items-center gap-2 p-3 pt-4 border-top border-dark border-opacity-25 text-center">
                        <button type="submit" class="btn btn-secondary px-5 submit-loader">
                            <span>{{ __('buttons.register') }}</span>

                            <span class="submit-loader-spinner">
                                <span class="spinner-border m-auto text-white"></span>
                            </span>
                        </button>

                        <a href="{{ route('login') }}" class="text-decoration-none">{{ __('texts.alreadyRegistered') }}</a>

                        <x-admin.lang :withIcon="true" />
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
