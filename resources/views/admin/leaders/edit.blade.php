<x-admin.modal.content
    :size="'lg'"
    :title="__('admin.editing')"
>
    <x-slot:body>
        <x-admin.control-form
            action="{{ route('admin.about.leader.update', $leader->id) }}"
            id="edit-leader-control-form"

            :method="'PATCH'"
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
            :form="'edit-leader-control-form'"
            :withLoader="true"
            :title="__('admin.save')"
            :iconName="'floppy'"
        />
    </x-slot:footer>
</x-admin.modal.content>
