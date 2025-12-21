@props([
    'withAction' => true,
    'isSortable' => true,
])

<div
    data-dynamic-fields-group
    {{ $attributes->merge(['class' => 'd-flex flex-column gap-3']) }}
>
    {{ $slot }}

    @if($withAction)
        <x-admin.dynamic-fields.action :is-sortable="$isSortable"/>
    @endif
</div>
