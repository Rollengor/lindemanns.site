<x-admin.modal.content
    :size="'xl'"
    :title="__('admin.creating')"
>
    <x-slot:body>
        <x-admin.control-form
            action="{{ route('admin.services.service.store') }}"
            id="create-service-control-form"

            :isUpdateFromView="true"
            :updateIdSection="'services-list'"
        >
            @include('admin.services.services.fields')
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
            :form="'create-service-control-form'"
            :withLoader="true"
            :title="__('admin.save')"
            :iconName="'floppy'"
        />
    </x-slot:footer>
</x-admin.modal.content>
