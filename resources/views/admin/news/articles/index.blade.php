@extends('admin.layouts.base')

@section('title', __('admin.articles') . ' - ' . config('app.name'))

@section('panel')
    <x-admin.main-panel :title="__('admin.articles')">
        <x-admin.ajax.view-modal-button
            class="mx-auto"
            :action="route('admin.news.article.create')"
            :modal_id="'article-control-modal'"
            :title="__('admin.create')"
            :iconName="'plus-circle'"
        />
    </x-admin.main-panel>
@endsection

@section('content')
    <x-admin.container>
        <div
            id="articles-list"
            class="d-flex flex-column flex-auto mx-n3 mx-sm-n4 mt-n4"
        >
            @include('admin.news.articles.list')
        </div>
    </x-admin.container>
@endsection

@push('modals')
    <x-admin.modal.wrapper id="article-control-modal" />
@endpush
