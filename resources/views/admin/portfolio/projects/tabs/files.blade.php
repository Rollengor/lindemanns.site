<div id="project-files" class="d-flex flex-column gap-4">
    @include('admin.portfolio.projects.files')
</div>

<x-admin.dynamic-fields.wrapper>
    <x-slot:template>
        <x-admin.dynamic-fields.group :is-sortable="false">
            <div class="grid gap-4">
                <!-- name -->
                <x-admin.field.text
                    class="g-col-12 g-col-lg-6"
                    :name="'new_files[0][name]'"
                    :placeholder="__('admin.file_name')"
                    :required="false"
                />

                <!-- file -->
                <x-admin.field.file
                    class="g-col-12 g-col-lg-6"
                    :name="'new_files[0][file]'"
                    :placeholder="__('admin.file')"
                    :required="false"
                />
            </div>
        </x-admin.dynamic-fields.group>
    </x-slot:template>
</x-admin.dynamic-fields.wrapper>
