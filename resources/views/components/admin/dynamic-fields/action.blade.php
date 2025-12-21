@props([
	'isSortable' => false,
])

<div class="d-flex gap-3 justify-content-end">
    @if($isSortable)
        <x-admin.button
            data-dynamic-fields-move
            class="p-2"
            :btn="'btn-outline-secondary'"
            :iconName="'arrows-move'"
        />
    @endif

    <x-admin.button
        data-dynamic-fields-plus
        class="p-2"
        :btn="'btn-outline-success'"
        :iconName="'plus-circle'"
    />

    <x-admin.button
        data-dynamic-fields-minus
        class="p-2"
        :btn="'btn-outline-danger'"
        :iconName="'dash-circle'"
    />
</div>
