@props([
	'modalId' => null,
	'action' => null,
	'title' => null,
])

<div id="{{ $modalId }}" class="modal fade">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">{{ $title }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body py-4">
                <form id="modalSearchForm" action="{{ $action }}" method="GET" class="d-flex flex-column gap-4">
                    <!-- search query -->
                    <x-admin.field.text
                        :name="'search_query'"
                        :value="old('search_query', request('search_query'))"
                        :placeholder="__('fields.query')"
                    />

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
                    :form="'modalSearchForm'"
                    :title="__('buttons.search')"
                    :withLoader="true"
                    :type="'submit'"
                />
            </div>
        </div>
    </div>
</div>
