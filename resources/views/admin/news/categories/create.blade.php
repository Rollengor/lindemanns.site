<x-admin.modal.content
    :size="'md'"
    :title="__('admin.creating')"
>
    <x-slot:body>
        <x-admin.control-form
            action="{{ route('admin.news.category.store') }}"
            id="create-category-control-form"

            :isUpdateFromView="true"
            :updateIdSection="'categories-list'"
        >
            @include('admin.news.categories.fields')
        </x-admin.control-form>
    </x-slot:body>

    <x-slot:footer>
        <x-admin.button
            class="me-auto"
            data-bs-dismiss="modal"
            :title="__('admin.cancel')"
            :btn="'btn-danger'"
        />

        <x-admin.button
            :type="'submit'"
            :form="'create-category-control-form'"
            :withLoader="true"
            :title="__('admin.save')"
            :iconName="'floppy'"
        />
    </x-slot:footer>
</x-admin.modal.content>
