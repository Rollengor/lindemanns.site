<div class="grid gap-4">
    <div class="d-flex flex-column gap-4 g-col-12 g-col-lg-5 g-col-xl-6">
        <!-- hero image -->
        <x-admin.field.image
            :name="'hero_image'"
            :placeholder="__('admin.hero_image') . ' ( 16 / 9 )'"
            :ratio="'16x9'"
            :fit="'contain'"
            :src="!(isset($isClone) && $isClone) && isset($service) && $service->hasMedia($service->mediaHero) ? $service->getFirstMediaUrl($service->mediaHero, 'md-webp') : null"
            :required="!(isset($isClone) && $isClone) && isset($service) ? !$service->hasMedia($service->mediaHero) : true"
        />
    </div>

    <div class="d-flex flex-column gap-4 g-col-12 g-col-lg-7 g-col-xl-6">
        <x-admin.tabs.wrapper>
            <x-slot:nav>
                @foreach(supported_languages_keys() as $lang)
                    <x-admin.tabs.nav-item
                        :is-active="$loop->first"
                        :target="'main-locale-' . $lang"
                        :title="$lang"
                    />
                @endforeach
            </x-slot:nav>

            <x-slot:content>
                @foreach(supported_languages_keys() as $lang)
                    <x-admin.tabs.pane :is-active="$loop->first" :id="'main-locale-' . $lang">
                        <div class="d-flex flex-column gap-4">
                            <!-- title -->
                            <x-admin.field.text
                                :name="'title['. $lang .']'"
                                :value="old('title.' . $lang, isset($service) ? $service->getTranslation('title', $lang) : null)"
                                :placeholder="__('admin.title')"
                            />

                            <!-- inner title -->
                            <x-admin.field.text
                                :name="'inner_title['. $lang .']'"
                                :value="old('inner_title.' . $lang, isset($service) ? $service->getTranslation('inner_title', $lang) : null)"
                                :placeholder="__('admin.inner_title')"
                                :required="false"
                            />

                            <!-- description -->
                            <x-admin.field.textarea
                                :name="'description['. $lang .']'"
                                :value="old('description.' . $lang, isset($service) ? $service->getTranslation('description', $lang) : null)"
                                :placeholder="__('admin.description')"
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
