@extends('admin.layouts.base')

@section('title', __('admin.services') . ' - ' . config('app.name'))

@section('panel')
    <x-admin.main-panel
        :title="__('admin.services')"
    >
        <x-admin.ajax.view-modal-button
            class="mx-auto"

            :action="route('admin.services.service.create')"
            :modal_id="'service-create-modal'"

            :title="__('admin.create')"
            :iconName="'plus-circle'"
        />
    </x-admin.main-panel>
@endsection

@section('content')
    <x-admin.container>
        <div id="services-list" class="d-flex flex-column flex-auto mx-n3 mx-sm-n4 mt-n4">
            @include('admin.services.services.list')
        </div>
    </x-admin.container>
@endsection

@push('modals')
    <x-admin.modal.wrapper id="service-create-modal"/>
    <x-admin.modal.wrapper id="service-edit-modal"/>
@endpush
