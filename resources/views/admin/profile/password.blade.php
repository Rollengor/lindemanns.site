@extends('admin.layouts.base')

@section('title', __('admin.change_password') . ' - ' . config('app.name'))

@section('panel')
    <x-admin.main-panel
        :title="__('admin.change_password')"
    >
        <x-admin.button
            data-submit-loader
            :type="'submit'"
            :form="'passwordForm'"
            :title="__('admin.save')"
            :iconName="'floppy'"
            :withLoader="true"
        />
    </x-admin.main-panel>
@endsection

@section('content')
    <x-admin.container
        :id="'passwordForm'"
        :action="route('password.update')"
        :method="'PUT'"
    >
        <div class="d-flex flex-column gap-4">
            <!-- password -->
            <x-admin.field.password
                class="flex-auto"

                :name="'current_password'"
                :value="old('password')"
                :placeholder="__('admin.current_password')"
            />

            <!-- password -->
            <x-admin.field.password
                class="flex-auto"

                :name="'password'"
                :value="old('password')"
                :placeholder="__('admin.new_password')"
            />

            <!-- confirm password -->
            <x-admin.field.password
                class="flex-auto"

                :name="'password_confirmation'"
                :value="old('password_confirmation')"
                :placeholder="__('admin.repeat_password')"
            />
        </div>
    </x-admin.container>
@endsection
