@props([
    'action' => null,
    'modal_id' => null,
    'title' => null,
    'iconName' => null,
])

<x-admin.button
    data-ajax-view-modal-button
    data-action="{{ $action }}"
    data-modal="{{ $modal_id }}"

    {{ $attributes }}

    :title="$title"
    :iconName="$iconName"
    :withLoader="true"
/>
