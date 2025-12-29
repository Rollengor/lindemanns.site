@extends('admin.layouts.base')

@section('title', __('admin.leader') . ' - ' . config('app.name'))

@section('panel')
    <x-admin.main-panel
        :title="__('admin.leader')"
    >
        <x-admin.ajax.view-modal-button
            class="mx-auto"

            :action="route('admin.about.leader.create')"
            :modal_id="'leader-create-modal'"

            :title="__('admin.create')"
            :iconName="'plus-circle'"
        />
    </x-admin.main-panel>
@endsection

@section('content')
    <x-admin.container>
        <div id="leaders-list" class="grid gap-4 {{ $leaders->isEmpty() ? 'flex-auto' : '' }}">
            @include('admin.leaders.list')
        </div>
    </x-admin.container>
@endsection

@push('modals')
    <x-admin.modal.wrapper id="leader-create-modal"/>
    <x-admin.modal.wrapper id="leader-edit-modal"/>
@endpush
