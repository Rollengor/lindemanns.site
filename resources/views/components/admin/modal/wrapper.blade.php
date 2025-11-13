<div
    style="z-index: 1255"
    {{ $attributes->merge(['class' => 'modal fade']) }}
    id="{{ $attributes->get('id') ?? $id }}"
    tabindex="-1"
    data-bs-backdrop="static"
    aria-labelledby="{{ $attributes->get('id') ?? $id }}"
    aria-hidden="true"
>
    {{ $slot }}
</div>
