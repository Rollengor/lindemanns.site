@props([
	'isClearHiddenFields' => false,
	'isSortable' => false,
])

<div
    data-addetible-fields-column
    {{ $isClearHiddenFields ? 'data-clear-hidden-fields' : null }}
    {{ $attributes->merge(['class' => 'd-flex flex-column gap-3']) }}
>
    {{ $slot }}

    <div class="d-flex gap-3 justify-content-end">
        @if($isSortable)
            <x-admin.button
                data-addetible-fields-btn-move
                class="p-2"
                :btn="'btn-outline-secondary'"
                :iconName="'arrows-move'"
            />
        @endif

        <x-admin.button
            data-addetible-fields-btn-plus
            class="p-2"
            :btn="'btn-outline-success'"
            :iconName="'plus-circle'"
        />

        <x-admin.button
            data-addetible-fields-btn-minus
            class="p-2"
            :btn="'btn-outline-danger'"
            :iconName="'dash-circle'"
        />
    </div>
</div>
