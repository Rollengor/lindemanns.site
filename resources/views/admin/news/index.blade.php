@extends('admin.layouts.base')

@section('title', __('admin.edit') . ' - ' . config('app.name'))

@section('panel')
    <x-admin.main-panel
        :title="__('admin.edit')"
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
        :action="route('admin.news.page.update', $page->id)"
        :method="'PATCH'"
    >
        <x-admin.tabs.wrapper>
            <x-slot:nav>
                @foreach(supported_languages_keys() as $lang)
                    <x-admin.tabs.nav-item
                        :is-active="$loop->first"
                        :target="'locale-' . $lang"
                        :title="$lang"
                    />
                @endforeach
            </x-slot:nav>

            <x-slot:content>
                @foreach(supported_languages_keys() as $lang)
                    <x-admin.tabs.pane :is-active="$loop->first" :id="'locale-' . $lang">
                        <div class="d-flex flex-column gap-4">
                            <!-- title -->
                            <x-admin.field.text
                                :name="'title['. $lang .']'"
                                :value="old('title.' . $lang, $page->getTranslation('title', $lang))"
                                :placeholder="__('admin.title')"
                            />

                            <!-- seo title -->
                            <x-admin.field.text
                                :name="'seo_title['. $lang .']'"
                                :value="old('seo_title.' . $lang, $page->getTranslation('seo_title', $lang))"
                                :placeholder="__('admin.seo_title')"
                                :required="false"
                            />

                            <!-- seo description -->
                            <x-admin.field.text
                                :name="'seo_description['. $lang .']'"
                                :value="old('seo_description.' . $lang, $page->getTranslation('seo_description', $lang))"
                                :placeholder="__('admin.seo_description')"
                                :required="false"
                            />

                            <!-- seo keywords -->
                            <x-admin.field.text
                                :name="'seo_keywords['. $lang .']'"
                                :value="old('seo_keywords.' . $lang, $page->getTranslation('seo_keywords', $lang))"
                                :placeholder="__('admin.seo_keywords')"
                                :required="false"
                            />
                        </div>
                    </x-admin.tabs.pane>
                @endforeach
            </x-slot:content>
        </x-admin.tabs.wrapper>

    </x-admin.container>
@endsection
