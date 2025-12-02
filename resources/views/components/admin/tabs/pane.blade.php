@props([
	'id' => '',
	'isActive' => false,
])

<div class="tab-pane fade {{ $isActive ? 'show active' : '' }}" id="{{ $id }}">
    {{ $slot }}
</div>
