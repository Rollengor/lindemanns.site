@extends('admin.layouts.base')

@section('title', __('titles.creatingManager') . ' - ' . config('app.name'))

@section('panel')
    <x-admin.main-panel
        :title="__('titles.createManager')"
    >
        <x-admin.button
            data-submit-loader
            :type="'submit'"
            :form="'createManager'"
            :title="__('buttons.save')"
            :iconName="'floppy'"
            :withLoader="true"
        />
    </x-admin.main-panel>
@endsection

@section('content')
    <x-admin.container
        :id="'createManager'"
        :action="route('admin.manager.store')"
        :method="'POST'"
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
            />

            <div style="min-width: 150px;" class="d-flex flex-column gap-4 flex-auto">
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

            <div style="min-width: 280px;" class="d-flex flex-column gap-4 flex-auto">
                <!-- username -->
                <x-admin.field.text
                    :name="'username'"
                    :value="old('username')"
                    :placeholder="__('fields.username')"
                    :pattern="'.{4,}'"
                />

                <!-- email -->
                <x-admin.field.email
                    :name="'email'"
                    :value="old('email')"
                    :placeholder="__('fields.email')"
                />
            </div>

            <div style="min-width: 280px;" class="d-flex flex-column gap-4 flex-auto">
                <!-- password -->
                <x-admin.field.password
                    :name="'password'"
                    :value="old('password')"
                    :placeholder="__('fields.password')"
                />

                <!-- roles -->
                <x-admin.field.select
                    class="flex-auto"
                    :name="'role'"
                    :placeholder="__('fields.role')"
                >
                    @foreach($roles as $key => $label)
                        <option value="{{ $key }}">{{ __('roles.' . $key) }}</option>
                    @endforeach
                </x-admin.field.select>
            </div>
        </div>

    </x-admin.container>
@endsection
