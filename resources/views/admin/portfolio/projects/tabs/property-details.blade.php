<x-admin.tabs.wrapper>
    <x-slot:nav>
        @foreach (supported_languages_keys() as $lang)
            <x-admin.tabs.nav-item
                :is-active="$loop->first"
                :target="'property-details-locale-' . $lang"
                :title="$lang"
            />
        @endforeach
    </x-slot:nav>

    <x-slot:content>
        @foreach (supported_languages_keys() as $lang)
            <x-admin.tabs.pane
                :is-active="$loop->first"
                :id="'property-details-locale-' . $lang"
            >
                <div class="d-flex flex-column gap-4">
                    <!-- type -->
                    <x-admin.field.text
                        :name="'property_details[' . $lang . '][property_type]'"
                        :placeholder="__('base.property_type')"
                        :value="isset($project)
                            ? data_get($project->getTranslations('property_details'), $lang . '.property_type')
                            : null"
                        :required="false"
                    />

                    <!-- status -->
                    <x-admin.field.text
                        :name="'property_details[' . $lang . '][status]'"
                        :placeholder="__('base.status')"
                        :value="isset($project)
                            ? data_get($project->getTranslations('property_details'), $lang . '.status')
                            : null"
                        :required="false"
                    />

                    <!-- year built -->
                    <x-admin.field.text
                        :name="'property_details[' . $lang . '][year_built]'"
                        :placeholder="__('base.year_built')"
                        :value="isset($project)
                            ? data_get($project->getTranslations('property_details'), $lang . '.year_built')
                            : null"
                        :required="false"
                    />
                </div>
            </x-admin.tabs.pane>
        @endforeach
    </x-slot:content>
</x-admin.tabs.wrapper>
