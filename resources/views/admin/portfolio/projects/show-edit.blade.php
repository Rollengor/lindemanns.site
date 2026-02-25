@extends('admin.layouts.base')

@section('title', __('admin.edit') . ' - ' . config('app.name'))

@section('panel')
    <x-admin.main-panel :title="__('admin.edit')">
        <x-admin.button
            :type="'submit'"
            :form="'edit-project-control-form'"
            :withLoader="true"
            :title="__('admin.save')"
            :iconName="'floppy'"
        />
    </x-admin.main-panel>
@endsection

@section('content')
    <x-admin.container>
        <div class="d-flex flex-column gap-4">
            <x-admin.control-form
                action="{{ route('admin.portfolio.project.update', $project->id) }}"
                id="edit-project-control-form"
                :method="'PATCH'"
            >
                @include('admin.portfolio.projects.fields')
            </x-admin.control-form>
        </div>
    </x-admin.container>
@endsection
