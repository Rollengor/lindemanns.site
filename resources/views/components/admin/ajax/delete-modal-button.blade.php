@props([
    'subtitle' => null,
    'deleteAction' => null,
    'updateIdSection' => null,
])

<x-admin.button
    class="btn-sm p-2"

    data-ajax-view-delete-modal-button
    data-action="{{ route('admin.confirm-delete-modal') }}"
    data-modal="confirm-delete-modal"
    data-subtitle="{{ $subtitle }}"
    data-delete-action="{{ $deleteAction }}"
    data-update-id-section="{{ $updateIdSection }}"

    :btn="'btn-danger'"
    :iconName="'trash'"
    :withLoader="true"
/>
