@props([
	'title' => '',
	'message' => '',
	'type' => 'base', //info, error, warning, success
	'alone' => false,
])

@php
    $typeColors = [
        'info' => 'text-purple',
        'error' => 'text-danger',
        'warning' => 'text-warning',
        'success' => 'text-success',
    ];

    $textColor = $type !== 'base' ? $typeColors[$type] : null;
@endphp

<div
     {{ !$alone ? 'data-toast-alert' : null }}
     role="alert"
     {{ $attributes->merge(['class' => 'toast bg-white m-0 fade ' . $textColor]) }}
     data-bs-autohide="false"
>
    @if($title)
        <div class="toast-header">
            <strong class="me-auto {{ $textColor }}">{{ $title }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    @else
        <div class="d-flex">
            @endif

            <div data-message class="toast-body flex-auto">{{ $message }}</div>

            @if(!$title)
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    @endif
</div>
