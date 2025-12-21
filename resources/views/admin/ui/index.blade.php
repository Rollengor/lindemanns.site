@extends('admin.layouts.base')

@section('title', __('titles.ui_elements') . ' - ' . config('app.name'))

@section('panel')
    <x-admin.main-panel
        :title="__('admin.ui_elements')"
    />
@endsection

@section('content')
    <x-admin.container>
        <div class="d-flex flex-column gap-4">
            <x-admin.field.checkbox :title="'Example Checkbox'"/>
            <x-admin.field.radio-switch :title="'Example Checkbox as Radio'" :name="'active'"/>

            <x-admin.addetible-fields.wrapper :is-sortable="true">
                <x-admin.addetible-fields.column :is-sortable="true">
                    <!-- title -->
                    <x-admin.field.text
                        :name="'title'"
                        :placeholder="__('admin.title')"
                    />
                </x-admin.addetible-fields.column>
            </x-admin.addetible-fields.wrapper>

            <x-admin.dynamic-fields.wrapper>
                {{--@foreach(old('emails', []) as $email)
                    <x-dynamic-fields.group :with_action="false">
                        <x-field.email
                            :placeholder="__('base.email')"
                            :name="'emails[' . $loop->index . ']'"
                            :value="$email"
                            :dynamiced="true"
                            :required="false"
                        />
                    </x-dynamic-fields.group>
                @endforeach--}}

                <x-slot:template>
                    <x-admin.dynamic-fields.group>
                        <!-- title -->
                        <x-admin.field.text
                            :name="'title[en][0][name]'"
                            :placeholder="__('admin.title')"
                        />
                    </x-admin.dynamic-fields.group>
                </x-slot:template>
            </x-admin.dynamic-fields.wrapper>
        </div>
    </x-admin.container>
@endsection
