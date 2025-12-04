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
            <x-admin.field.checkbox :title="'Example Title'"/>
            <x-admin.field.radio-switch :title="'Example Title'" :name="'active'"/>
        </div>
    </x-admin.container>
@endsection
