<div class="grid gap-4">
    <div class="g-col-12 g-col-md-4">
        <!-- image -->
        <x-admin.field.image
            :name="'hero_image'"
            :placeholder="__('admin.bg_image') . ' ( 16 / 9 )'"
            :ratio="'16x9'"
            :fit="'contain'"
            :src="$page->hasMedia('hero-image') ? $page->getFirstMediaUrl('hero-image', 'md-webp') : null"
            :required="!$page->hasMedia('hero-image')"
        />
    </div>

    <div class="g-col-12 g-col-md-8">
        <x-admin.tabs.wrapper>
            <x-slot:nav>
                @foreach(supported_languages_keys() as $lang)
                    <x-admin.tabs.nav-item
                        :is-active="$loop->first"
                        :target="'hero-locale-' . $lang"
                        :title="$lang"
                    />
                @endforeach
            </x-slot:nav>

            <x-slot:content>
                @foreach(supported_languages_keys() as $lang)
                    <x-admin.tabs.pane :is-active="$loop->first" :id="'hero-locale-' . $lang">
                        <div class="d-flex flex-column gap-4">
                            <!-- title -->
                            <x-admin.field.text
                                :name="'title['. $lang .']'"
                                :value="old('title.' . $lang, $page->getTranslation('title', $lang))"
                                :placeholder="__('admin.title')"
                            />

                            <!-- subtitle -->
                            <x-admin.field.text
                                :name="'content_data['. $lang .'][subtitle]'"
                                :value="old('content_data.' . $lang . '.subtitle', data_get($page->getTranslation('content_data', $lang), 'subtitle'))"
                                :placeholder="__('admin.subtitle')"
                            />

                            <!-- description -->
                            <x-admin.field.textarea
                                :name="'content_data['. $lang .'][description]'"
                                :value="old('content_data.' . $lang . '.description', data_get($page->getTranslation('content_data', $lang), 'description'))"
                                :placeholder="__('admin.description')"
                            />
                        </div>
                    </x-admin.tabs.pane>
                @endforeach
            </x-slot:content>
        </x-admin.tabs.wrapper>
    </div>
</div>
