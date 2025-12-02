@props([
    'isActive' => false,
	'target' => null,
	'title' => null,
])

<li class="nav-item">
    <x-admin.button
        class="text-uppercase text-nowrap {{ $isActive ? 'active' : '' }}"
        data-bs-toggle="pill"
        data-bs-target="#{{ $target }}"
        :btn="'btn-outline-secondary'"
        :title="$title"
    />
</li>
