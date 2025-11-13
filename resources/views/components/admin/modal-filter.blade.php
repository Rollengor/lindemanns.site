@props([
	'modalId' => null,
	'action' => null,
	'title' => null,
])

<div id="{{ $modalId }}" class="modal fade">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">{{ $title }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body py-4">
                <form id="modalFilterForm" action="{{ $action }}" method="GET" class="d-flex flex-column gap-4">
                    {{ $slot }}
                </form>
            </div>

            <div class="modal-footer p-3 gap-3">
                <x-admin.button
                    class="flex-auto m-0"
                    :href="$action"
                    :title="__('buttons.reset')"
                    :btn="'btn-danger'"
                />

                <x-admin.button
                    class="flex-auto m-0"
                    data-submit-loader
                    :form="'modalFilterForm'"
                    :title="__('buttons.apply')"
                    :withLoader="true"
                    :type="'submit'"
                />
            </div>
        </div>
    </div>
</div>
