@extends('admin.layouts.base')

@section('title', __('admin.ui_elements') . ' - ' . config('app.name'))

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

            <x-admin.dynamic-fields.wrapper>
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

            <!-- file -->
            <x-admin.field.file
                :name="'file[0]'"
                :placeholder="__('admin.file')"
            />
        </div>
    </x-admin.container>
@endsection
