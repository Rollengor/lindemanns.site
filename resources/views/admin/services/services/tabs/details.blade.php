<x-admin.tabs.wrapper>
    <x-slot:nav>
        @foreach(supported_languages_keys() as $lang)
            <x-admin.tabs.nav-item
                :is-active="$loop->first"
                :target="'details-locale-' . $lang"
                :title="$lang"
            />
        @endforeach
    </x-slot:nav>

    <x-slot:content>
        @foreach(supported_languages_keys() as $lang)
            <x-admin.tabs.pane :is-active="$loop->first" :id="'details-locale-' . $lang">
                <div class="d-flex flex-column gap-4">
                    <!-- section title -->
                    <x-admin.field.text
                        :name="'details['. $lang .'][title]'"
                        :value="old('details.' . $lang . '.title', isset($service) ? data_get($service->getTranslation('details', $lang), 'title') : null)"
                        :placeholder="__('admin.section_title')"
                    />

                    <hr class="border-4">

                    <x-admin.dynamic-fields.wrapper>
                        @php
                            $detailsList = isset($service) ? data_get($service->getTranslation('details', $lang), 'list') : [];
                        @endphp

                        @foreach($detailsList as $detail)
                            @php
                                $loopIndex = $loop->index;
                            @endphp

                            <x-admin.dynamic-fields.group>
                                <div class="d-flex flex-column gap-4">
                                    <!-- title -->
                                    <x-admin.field.text
                                        :name="'details['. $lang .'][' . $loopIndex . '][title]'"
                                        :value="!empty($detailsList) ? data_get($detailsList, $loopIndex . '.title') : null"
                                        :placeholder="__('admin.title')"
                                    />

                                    <!-- description -->
                                    <x-admin.field.wysiwyg
                                        :name="'details['. $lang .'][' . $loopIndex . '][description]'"
                                        :value="!empty($detailsList) ? data_get($detailsList, $loopIndex . '.description') : null"
                                        :placeholder="__('admin.description')"
                                        :height="100"
                                    />
                                </div>
                            </x-admin.dynamic-fields.group>
                        @endforeach

                        <x-slot:template>
                            <x-admin.dynamic-fields.group>
                                <div class="d-flex flex-column gap-4">
                                    <!-- title -->
                                    <x-admin.field.text
                                        :name="'details['. $lang .'][0][title]'"
                                        :placeholder="__('admin.title')"
                                    />

                                    <!-- description -->
                                    <x-admin.field.wysiwyg
                                        :name="'details['. $lang .'][0][description]'"
                                        :placeholder="__('admin.description')"
                                        :height="100"
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
