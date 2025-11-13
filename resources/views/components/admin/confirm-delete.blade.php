@props([
	'id',
	'title' => null,
	'type' => 'delete',
	'for' => '',
	'subtitle' => null,
	'url' => '',
])

<div id="{{ $id }}" class="modal fade">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-body text-center">
                <h3 class="modal-title fs-5 lh-sm">
                    @if($type === 'delete')
                        {{ $title ?? ( $for ? "Confirm $for deletion" : 'Confirm deletion') }}
                    @endif
                </h3>
                @if($subtitle)
                    <div class="text-gray mt-2">{{ $subtitle }}</div>
                @endif
            </div>

            <div class="modal-footer p-3 gap-3">
                @if($type === 'delete')
                    <form action="{{ $url }}" method="POST" class="flex-auto m-0">
                        @csrf
                        @method('DELETE')

                        <x-admin.button
                            class="w-100"
                            :btn="'btn-danger'"
                            :title="__('buttons.delete')"
                            :withLoader="true"
                            :type="'submit'"
                        />
                    </form>
                @endif

                <x-admin.button
                    class="flex-auto m-0"
                    data-bs-dismiss="modal"
                    :title="__('buttons.close')"
                />
            </div>
        </div>
    </div>
</div>
