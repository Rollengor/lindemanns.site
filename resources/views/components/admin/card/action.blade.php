@props([
    'linkHref' => null,
	'editHref' => '#',
	'deleteId' => null,
	'static' => false,
])

<div {{ $attributes->merge(['class' => 'd-flex justify-content-center gap-3 ' . (!$static ? 'hover-content position-absolute top-0 end-0 p-3' : null)]) }}>
    {{ $slot }}

    @if($linkHref)
        <x-admin.button
            class="btn-sm p-2"
            :href="$linkHref"
            :iconName="'box-arrow-up-right'"
            :btn="'btn-primary'"
            :target="'_blank'"
        />
    @endif

    <x-admin.button
        class="btn-sm p-2"
        :href="$editHref"
        :iconName="'pen'"
    />

    @if($deleteId)
        <x-admin.button
            class="btn-sm p-2"
            data-bs-toggle="modal"
            data-bs-target="{{ $deleteId }}"
            :btn="'btn-danger'"
            :iconName="'trash'"
        />
    @endif
</div>
