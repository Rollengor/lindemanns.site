@props([
    'id' => null,
    'wrapperStyles' => 'd-flex flex-column gap-4',
    'regexpType' => 'global', // global, simple
    'isSortable' => true,
])

@php
    $slotContent = trim($slot);
    $shouldRenderDefault = empty($slotContent);
@endphp

<div
    data-dynamic-fields
    {{ $attributes->merge(['class' => 'd-flex flex-column gap-4']) }}
>

    <div
        {{ $id ? 'id=' . $id : null }}
        data-dynamic-fields-wrapper
        {{ $isSortable ? 'data-sortable-wrapper' : null }}
        data-regexp-type="{{ $regexpType }}"
        class="{{ $wrapperStyles }}"
    >
        @if ($shouldRenderDefault)
            {{ $template }}
        @else
            {{ $slot }}
        @endif
    </div>

    <template data-dynamic-fields-template>
        {{ $template }}
    </template>
</div>
