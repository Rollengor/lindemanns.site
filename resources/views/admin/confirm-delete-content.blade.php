<div class="modal-dialog modal-dialog-centered modal-sm">
    <div class="modal-content">
        <div class="modal-body text-center">
            <h3 class="modal-title fs-5 lh-sm">{{ __('base.confirm_deletion') }}</h3>

            @if($subtitle)
                <div class="text-gray mt-2">{{ $subtitle }}</div>
            @endif
        </div>

        <div class="modal-footer p-3 gap-3">
            <x-admin.control-form
                class="flex-auto m-0"
                action="{{ $delete_action }}"

                :method="'DELETE'"
                :isUpdateFromView="!empty($update_id_section)"
                :updateIdSection="$update_id_section"
            >
                <x-admin.button
                    class="w-100"
                    :btn="'btn-danger'"
                    :title="__('buttons.delete')"
                    :withLoader="true"
                    :type="'submit'"
                />
            </x-admin.control-form>

            <x-admin.button
                class="flex-auto m-0"
                data-bs-dismiss="modal"
                :title="__('buttons.close')"
            />
        </div>
    </div>
</div>
