<div class="grid gap-4">
    <div class="d-flex flex-column gap-4 g-col-12 g-col-lg-5 g-col-xl-4">
        <!-- hero image -->
        <x-admin.field.image
            :name="'photo'"
            :placeholder="__('admin.photo') . ' ( 1 / 1)'"
            :ratio="'1x1'"
            :fit="'contain'"
            :src="isset($leader) && $leader->hasMedia($leader->mediaPhoto) ? $leader->getFirstMediaUrl($leader->mediaPhoto, 'md-webp') : null"
            :required="isset($leader) ? !$leader->hasMedia($leader->mediaPhoto) : true"
        />
    </div>

    <div class="d-flex flex-column gap-4 g-col-12 g-col-lg-7 g-col-xl-8">
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
                            <!-- name -->
                            <x-admin.field.text
                                :name="'name['. $lang .']'"
                                :value="old('name.' . $lang, isset($leader) ? $leader->getTranslation('name', $lang) : null)"
                                :placeholder="__('admin.name')"
                            />

                            <!-- position -->
                            <x-admin.field.text
                                :name="'position['. $lang .']'"
                                :value="old('position.' . $lang, isset($leader) ? $leader->getTranslation('position', $lang) : null)"
                                :placeholder="__('admin.position')"
                            />

                            <x-admin.dynamic-fields.wrapper>
                                @php
                                    $info = isset($leader) ? $leader->getTranslation('info', $lang) : [];
                                @endphp

                                @foreach($info ?: [] as $item)
                                    <x-admin.dynamic-fields.group>
                                        <div class="d-flex flex-column gap-4">
                                            <!-- info head -->
                                            <x-admin.field.text
                                                :name="'info['. $lang .'][' . $loop->index . '][head]'"
                                                :value="$item['head']"
                                                :placeholder="__('admin.info_head')"
                                            />

                                            <!-- info description -->
                                            <x-admin.field.text
                                                :name="'info['. $lang .'][' . $loop->index . '][description]'"
                                                :value="$item['description']"
                                                :placeholder="__('admin.info_description')"
                                            />
                                        </div>
                                    </x-admin.dynamic-fields.group>
                                @endforeach

                                <x-slot:template>
                                    <x-admin.dynamic-fields.group>
                                        <div class="d-flex flex-column gap-4">
                                            <!-- info head -->
                                            <x-admin.field.text
                                                :name="'info['. $lang .'][0][head]'"
                                                :placeholder="__('admin.info_head')"
                                            />

                                            <!-- info description -->
                                            <x-admin.field.text
                                                :name="'info['. $lang .'][0][description]'"
                                                :placeholder="__('admin.info_description')"
                                            />
                                        </div>
                                    </x-admin.dynamic-fields.group>
                                </x-slot:template>
                            </x-admin.dynamic-fields.wrapper>
                        </div>
                    </x-admin.tabs.pane>
                @endforeach
            </x-slot:content>
        </x-admin.tabs.wrapper>

        <div class="d-flex gap-3">
            <!-- resume -->
            <x-admin.field.file
                class="col"
                :name="'resume'"
                :placeholder="__('admin.resume')"
                :required="!(isset($leader) && $leader->hasMedia($leader->mediaResume))"
            />

            @if(isset($leader) && $leader->hasMedia($leader->mediaResume))
                @php
                    $resume = $leader->getFirstMedia($leader->mediaResume);
                @endphp

                <!-- download -->
                <x-admin.button
                    :btnInFieldGroup="true"
                    :href="$resume->getUrl()"
                    :icon-name="'download'"
                    download="{{ isset($leader) ? $leader->getTranslation('name', $lang) . '-' . __('admin.resume') : __('admin.resume') }}"
                />
            @endif
        </div>

        <!-- sort -->
        <x-admin.field.number
            :name="'sort'"
            :value="old('sort', isset($leader) ? $leader->sort : 1000)"
            :placeholder="__('admin.sort')"
        />

        <!-- active -->
        <x-admin.field.radio-switch
            class="m-0 me-auto"

            :name="'active'"
            :title="__('admin.show')"
            :checked="isset($leader) ? $leader->active : true"
        />
    </div>
</div>
