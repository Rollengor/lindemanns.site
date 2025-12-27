@props([
    'subtitle' => null,
    'deleteAction' => null,
    'updateIdSection' => null,
    'btnInFieldGroup' => false,
    'withHideModals' => true,
])

<x-admin.button
    class="btn-sm {{ !$btnInFieldGroup ? 'p-2' : '' }}"
    data-ajax-view-delete-modal-button
    data-action="{{ route('admin.confirm-delete-modal') }}"
    data-modal="confirm-delete-modal"
    data-subtitle="{{ $subtitle }}"
    data-delete-action="{{ $deleteAction }}"
    data-update-id-section="{{ $updateIdSection }}"
    data-with-hide-modals="{{ (int) $withHideModals }}"

    :btn="'btn-danger'"
    :iconName="'trash'"
    :withLoader="true"
    :btnInFieldGroup="$btnInFieldGroup"
/>
