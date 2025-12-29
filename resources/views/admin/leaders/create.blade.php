<x-admin.modal.content
    :size="'lg'"
    :title="__('admin.creating')"
>
    <x-slot:body>
        <x-admin.control-form
            action="{{ route('admin.about.leader.store') }}"
            id="create-leader-control-form"

            :isUpdateFromView="true"
            :updateIdSection="'leaders-list'"
        >
            @include('admin.leaders.fields')
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
            :form="'create-leader-control-form'"
            :withLoader="true"
            :title="__('admin.save')"
            :iconName="'floppy'"
        />
    </x-slot:footer>
</x-admin.modal.content>
