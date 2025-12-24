<x-admin.dynamic-fields.wrapper>
    {{--@foreach($tags as $tag)
        <x-admin.dynamic-fields.group>
            <div class="d-flex flex-column gap-4">
                <!-- tag name -->
                <x-admin.field.file
                    :name="'files[' . $loop->index . '][file]'"
                    :value="$tag"
                    :placeholder="__('admin.tag_name')"
                />
            </div>
        </x-admin.dynamic-fields.group>
    @endforeach--}}

    <x-slot:template>
        <x-admin.dynamic-fields.group>
            <div class="d-flex flex-column gap-4">
                <!-- name -->
                <x-admin.field.text
                    :name="'files[0][name]'"
                    :placeholder="__('admin.file_name')"
                />

                <!-- file -->
                <x-admin.field.file
                    :name="'files[0][file]'"
                    :placeholder="__('admin.tag_name')"
                />
            </div>
        </x-admin.dynamic-fields.group>
    </x-slot:template>
</x-admin.dynamic-fields.wrapper>
{{--<x-admin.tabs.wrapper>
    <x-slot:nav>
        @foreach(supported_languages_keys() as $lang)
            <x-admin.tabs.nav-item
                :is-active="$loop->first"
                :target="'files-locale-' . $lang"
                :title="$lang"
            />
        @endforeach
    </x-slot:nav>

    <x-slot:content>
        @foreach(supported_languages_keys() as $lang)
            <x-admin.tabs.pane :is-active="$loop->first" :id="'files-locale-' . $lang">

            </x-admin.tabs.pane>
        @endforeach
    </x-slot:content>
</x-admin.tabs.wrapper>--}}
