@extends('admin.layouts.base')

@section('title', __('admin.editing') . ' - ' . config('app.name'))

@section('panel')
    <x-admin.main-panel
        :title="__('admin.editing')"
    >
        <x-admin.button
            data-submit-loader
            :type="'submit'"
            :form="'updateForm'"
            :title="__('admin.save')"
            :iconName="'floppy'"
            :withLoader="true"
            :withMiniStyle="true"
        />
    </x-admin.main-panel>
@endsection

@section('content')
    <x-admin.container
        :id="'updateForm'"
        :action="route('admin.news.article.update', $article->id)"
        :method="'PATCH'"
    >
        @include('admin.news.articles.fields')
    </x-admin.container>
@endsection
