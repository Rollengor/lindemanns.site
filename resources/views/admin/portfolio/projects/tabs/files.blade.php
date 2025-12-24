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
            <div class="grid gap-4">
                <!-- name -->
                <x-admin.field.text
                    class="g-col-12 g-col-lg-5"
                    :name="'files[0][name]'"
                    :placeholder="__('admin.file_name')"
                />

                <!-- file -->
                <x-admin.field.file
                    class="g-col-12 g-col-lg-7"
                    :name="'files[0][file]'"
                    :placeholder="__('admin.file')"
                />
            </div>
        </x-admin.dynamic-fields.group>
    </x-slot:template>
</x-admin.dynamic-fields.wrapper>
