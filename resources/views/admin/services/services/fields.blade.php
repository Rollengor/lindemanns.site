<div class="grid gap-4">
    <div class="d-flex flex-column gap-4 g-col-12 g-col-sm-5 g-col-md-4">
        <!-- hero image -->
        <x-admin.field.image
            :name="'hero_image'"
            :placeholder="__('admin.hero_image') . ' ( 16 / 9 )'"
            :ratio="'16x9'"
            :fit="'contain'"
            :src="isset($service) && $service->hasMedia($service->mediaHero) ? $service->getFirstMediaUrl($service->mediaHero, 'md-webp') : null"
            :required="isset($service) ? !$service->hasMedia($service->mediaHero) : true"
        />

        <!-- info image -->
        <x-admin.field.image
            :name="'info_image'"
            :placeholder="__('admin.info_image') . ' ( 5 / 6 )'"
            :ratio="'5x6'"
            :src="isset($service) && $service->hasMedia($service->mediaInfo) ? $service->getFirstMediaUrl($service->mediaInfo, 'md-webp') : null"
            :required="isset($service) ? !$service->hasMedia($service->mediaInfo) : true"
        />
    </div>

    <div class="d-flex flex-column gap-4 g-col-12 g-col-sm-7 g-col-md-8">
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
                                :value="old('title.' . $lang, isset($service) ? $service->getTranslation('title', $lang) : null)"
                                :placeholder="__('admin.title')"
                            />

                            <!-- description -->
                            <x-admin.field.wysiwyg
                                :name="'description['. $lang .']'"
                                :value="old('description.' . $lang, isset($service) ? $service->getTranslation('description', $lang) : null)"
                                :placeholder="__('admin.description')"
                            />

                            <!-- seo title -->
                            <x-admin.field.text
                                :name="'seo_title['. $lang .']'"
                                :value="old('seo_title.' . $lang, isset($service) ? $service->getTranslation('seo_title', $lang) : null)"
                                :placeholder="__('admin.seo_title')"
                                :required="false"
                            />

                            <!-- seo description -->
                            <x-admin.field.text
                                :name="'seo_description['. $lang .']'"
                                :value="old('seo_description.' . $lang, isset($service) ? $service->getTranslation('seo_description', $lang) : null)"
                                :placeholder="__('admin.seo_description')"
                                :required="false"
                            />

                            <!-- seo keywords -->
                            <x-admin.field.text
                                :name="'seo_keywords['. $lang .']'"
                                :value="old('seo_keywords.' . $lang, isset($service) ? $service->getTranslation('seo_keywords', $lang) : null)"
                                :placeholder="__('admin.seo_keywords')"
                                :required="false"
                            />
                        </div>
                    </x-admin.tabs.pane>
                @endforeach
            </x-slot:content>
        </x-admin.tabs.wrapper>

        <!-- category -->
        <x-admin.field.select
            :placeholder="__('admin.category')"
            :name="'service_category_id'"
        >
            @foreach($categories as $category)
                <option {{ isset($service) && $service->category?->id === $category->id ? 'selected' : null }} value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </x-admin.field.select>

        <!-- sort -->
        <x-admin.field.number
            :name="'sort'"
            :value="old('sort', isset($service) ? $service->sort : 1000)"
            :placeholder="__('admin.sort')"
        />

        <!-- active -->
        <x-admin.field.radio-switch
            class="m-0 me-auto"

            :name="'active'"
            :title="__('admin.show')"
            :checked="isset($service) ? $service->active : true"
        />
    </div>
</div>
