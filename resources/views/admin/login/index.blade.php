@extends('admin.layouts.base')

@section('title', __('titles.edit') . ' - ' . config('app.name'))

@section('panel')
    <x-admin.main-panel
        :title="__('titles.edit')"
    >
        <x-admin.button
            data-submit-loader
            :type="'submit'"
            :form="'updateForm'"
            :title="__('buttons.save')"
            :iconName="'floppy'"
            :withLoader="true"
            :withMiniStyle="true"
        />
    </x-admin.main-panel>
@endsection

@section('content')
    <x-admin.container
        :id="'updateForm'"
        :action="route('admin.login.page.update', $page->id)"
        :method="'PATCH'"
    >
        <div class="grid gap-4 align-items-start">
            <div class="g-col-12 g-col-md-4">
                <!-- image -->
                <x-admin.field.image
                    :name="'image'"
                    :placeholder="__('fields.bg_image') . ' ( 3 / 2 )'"
                    :ratio="'3x2'"
                    :src="$page->hasMedia($page->mediaCollection) ? $page->getFirstMediaUrl($page->mediaCollection, 'md-webp') : null"
                    :required="!$page->hasMedia($page->mediaCollection)"
                />
            </div>

            <div class="g-col-12 g-col-md-8 d-flex flex-column gap-4">
                <!-- title -->
                <x-admin.field.text
                    :name="'title'"
                    :value="old('title', $page->title)"
                    :placeholder="__('fields.title')"
                />

                <!-- seo title -->
                <x-admin.field.text
                    :name="'seo_title'"
                    :value="old('seo_title', $page->seo_title)"
                    :placeholder="__('fields.seoTitle')"
                    :required="false"
                />

                <!-- seo description -->
                <x-admin.field.text
                    :name="'seo_description'"
                    :value="old('seo_description', $page->seo_description)"
                    :placeholder="__('fields.seoDescription')"
                    :required="false"
                />

                <!-- seo keywords -->
                <x-admin.field.text
                    :name="'seo_keywords'"
                    :value="old('seo_keywords', $page->seo_keywords)"
                    :placeholder="__('fields.seoKeywords')"
                    :required="false"
                />
            </div>
        </div>

    </x-admin.container>
@endsection
