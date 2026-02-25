@extends('admin.layouts.base')

@section('title', __('admin.categories') . ' - ' . config('app.name'))

@section('panel')
    <x-admin.main-panel :title="__('admin.categories')">
        <x-admin.ajax.view-modal-button
            class="mx-auto"
            :action="route('admin.news.category.create')"
            :modal_id="'category-control-modal'"
            :title="__('admin.create')"
            :iconName="'plus-circle'"
        />
    </x-admin.main-panel>
@endsection

@section('content')
    <x-admin.container>
        <div
            id="categories-list"
            class="d-flex flex-column flex-auto mx-n3 mx-sm-n4 mt-n4"
        >
            @include('admin.news.categories.list')
        </div>
    </x-admin.container>
@endsection

@push('modals')
    <x-admin.modal.wrapper id="category-control-modal" />
@endpush
