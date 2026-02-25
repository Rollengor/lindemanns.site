@extends('admin.layouts.base')

@section('title', __('admin.projects') . ' - ' . config('app.name'))

@section('panel')
    <x-admin.main-panel :title="__('admin.projects')">
        <x-admin.ajax.view-modal-button
            class="mx-auto"
            :action="route('admin.portfolio.project.create')"
            :modal_id="'project-control-modal'"
            :title="__('admin.create')"
            :iconName="'plus-circle'"
        />
    </x-admin.main-panel>
@endsection

@section('content')
    <x-admin.container>
        <div
            id="projects-list"
            class="d-flex flex-column flex-auto mx-n3 mx-sm-n4 mt-n4"
        >
            @include('admin.portfolio.projects.list')
        </div>
    </x-admin.container>
@endsection

@push('modals')
    <x-admin.modal.wrapper id="project-control-modal" />
@endpush
