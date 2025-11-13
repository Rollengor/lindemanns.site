@extends('admin.layouts.base')

@section('title', __('titles.profile') . ' - ' . config('app.name'))

@section('panel')
    <x-admin.main-panel
        :title="__('titles.profile')"
    >
        <x-admin.button
            data-submit-loader
            :type="'submit'"
            :form="'profileForm'"
            :title="__('buttons.save')"
            :iconName="'floppy'"
            :withLoader="true"
        />
    </x-admin.main-panel>
@endsection

@section('content')
    <x-admin.container
        :id="'profileForm'"
        :action="route('profile.update')"
        :method="'PATCH'"
    >
        <div class="d-flex flex-wrap gap-4">
            <!-- avatar -->
            <x-admin.field.image
                style="width: 108px;"

                :name="'avatar'"
                :placeholder="__('fields.avatar')"
                :ratio="'1x1'"
                :rounded="'rounded-circle'"
                :required="false"
                :src="$user->hasMedia($user->mediaCollection) ? $user->getFirstMediaUrl($user->mediaCollection, 'avatar') : null"
            />

            <div style="min-width: 150px;" class="d-flex flex-column gap-4 flex-auto">
                <!-- first name -->
                <x-admin.field.text
                    :name="'first_name'"
                    :value="old('first_name', $user->first_name)"
                    :placeholder="__('fields.firstName')"
                />

                <!-- last name -->
                <x-admin.field.text
                    :name="'last_name'"
                    :value="old('last_name', $user->last_name)"
                    :placeholder="__('fields.lastName')"
                />
            </div>

            <div style="min-width: 280px;" class="d-flex flex-column gap-4 flex-auto">
                <!-- username -->
                <x-admin.field.text
                    class="flex-auto"

                    :name="'username'"
                    :value="old('username', $user->username)"
                    :placeholder="__('fields.username')"
                    :pattern="'.{4,}'"
                />

                <!-- email -->
                <x-admin.field.email
                    class="flex-auto"

                    :name="'email'"
                    :value="old('email', $user->email)"
                    :placeholder="__('fields.email')"
                />
            </div>
        </div>
    </x-admin.container>
@endsection
