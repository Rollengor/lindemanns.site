@extends('admin.layouts.base')

@section('title', __('admin.home') . ' - ' . config('app.name'))

@section('panel')
    <x-admin.main-panel
        :title="__('admin.home')"
    >
        <x-admin.button
            data-submit-loader
            :type="'submit'"
            :form="'controlForm'"
            :title="__('admin.save')"
            :iconName="'floppy'"
            :withLoader="true"
            :withMiniStyle="true"
        />
    </x-admin.main-panel>
@endsection

@section('content')
    <x-admin.container
        :id="'controlForm'"
        :action="route('admin.about.page.update', $page->id)"
        :method="'PATCH'"
    >
        <x-admin.tabs.wrapper>
            <x-slot:nav>
                <x-admin.tabs.nav-item
                    :is-active="true"
                    :target="'main-pane'"
                    :title="__('admin.hero')"
                />

                <x-admin.tabs.nav-item
                    :target="'seo-pane'"
                    :title="__('admin.seo')"
                />
            </x-slot:nav>

            <x-slot:content>
                <x-admin.tabs.pane :is-active="true" :id="'main-pane'">
                    @include('admin.about.tabs.main')
                </x-admin.tabs.pane>

                <x-admin.tabs.pane :id="'seo-pane'">
                    @include('admin.about.tabs.seo')
                </x-admin.tabs.pane>
            </x-slot:content>
        </x-admin.tabs.wrapper>

    </x-admin.container>
@endsection
