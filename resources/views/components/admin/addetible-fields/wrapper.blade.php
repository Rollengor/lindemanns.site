@props([
    'updateIndexTrigger' => null,
	'classes' => 'd-flex flex-column gap-4',
	'isSortable' => false,
])

<div
    data-addetible-fields-wrapper
    {{ $updateIndexTrigger ? 'data-index-trigger=' . $updateIndexTrigger : null }}
    {{ $isSortable ? 'data-sortable-wrapper' : null }}
    class="{{ $classes }}"
>
    {{ $slot }}
</div>
