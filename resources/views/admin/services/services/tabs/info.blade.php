<div class="grid gap-4">
    <div class="d-flex flex-column gap-4 g-col-12 g-col-lg-4 g-col-xl-3">
        <!-- hero image -->
        <x-admin.field.image
            :name="'info_image'"
            :placeholder="__('admin.info_image') . ' ( 5 / 6 )'"
            :ratio="'5x6'"
            :fit="'contain'"
            :src="isset($service) && $service->hasMedia($service->mediaInfo) ? $service->getFirstMediaUrl($service->mediaInfo, 'md-webp') : null"
            :required="isset($service) ? !$service->hasMedia($service->mediaInfo) : true"
        />
    </div>

    <div class="d-flex flex-column gap-4 g-col-12 g-col-lg-8 g-col-xl-9">
        <x-admin.tabs.wrapper>
            <x-slot:nav>
                @foreach(supported_languages_keys() as $lang)
                    <x-admin.tabs.nav-item
                        :is-active="$loop->first"
                        :target="'info-locale-' . $lang"
                        :title="$lang"
                    />
                @endforeach
            </x-slot:nav>

            <x-slot:content>
                @foreach(supported_languages_keys() as $lang)
                    <x-admin.tabs.pane :is-active="$loop->first" :id="'info-locale-' . $lang">
                        <div class="d-flex flex-column gap-4">
                            <!-- section title -->
                            <x-admin.field.text
                                :name="'info['. $lang .'][title]'"
                                :value="old('info.' . $lang . '.title', isset($service) ? data_get($service->getTranslation('info', $lang), 'title') : null)"
                                :placeholder="__('admin.section_title')"
                            />
                        </div>
                    </x-admin.tabs.pane>
                @endforeach
            </x-slot:content>
        </x-admin.tabs.wrapper>
    </div>
</div>
