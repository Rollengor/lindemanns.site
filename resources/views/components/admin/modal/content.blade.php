@props([
	'size' => null, // sm, lg, xl
	'title' => null,
])

<div class="modal-dialog modal-dialog-centered {{ $size ? 'modal-' . $size : null }}">
    <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5">{{ $title }}</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            {{ $body }}
        </div>
        <div class="modal-footer">
            {{ $footer }}
        </div>
    </div>
</div>
