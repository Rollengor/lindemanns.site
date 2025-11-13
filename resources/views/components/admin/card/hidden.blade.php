@props([
	'static' => false,
])

<div {{ $attributes->merge(['class' => (!$static ? 'position-absolute top-0 start-0 p-3' : null)]) }}>
    <x-admin.button
        class="btn-sm p-2 pe-none"
        :iconName="'eye-slash'"
    />
</div>
