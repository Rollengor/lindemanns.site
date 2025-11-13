@props([
    'name' => '',
    'value' => '',
    'required' => true,
    'autocomplete' => 'new-password',
    'placeholder' => null,
    'fieldAttrs' => null,
    'pattern' => '.{8,}',
])

<div data-switch-show-password {{ $attributes->merge(['class' => 'input-group position-relative']) }}>
    <input
        data-form-control
        data-ssp-field
        class="form-control"
        {{ $fieldAttrs ?? null }}
        type="password"
        name="{{ $name }}"
        value="{{ $value }}"
        pattern="{{ $pattern }}"
        {{ $required ? 'required' : null }}
        autocomplete="{{ $autocomplete }}"
    />

    @if($placeholder)
        <span class="form-control-placeholder">{{ $placeholder }} {!! $required ? '<span class="text-danger opacity-75"> *</span>' : null !!}</span>
    @endif

    <button data-ssp-switcher class="d-flex align-items-center btn btn-outline-secondary px-3" type="button">
        <svg class="bi" width="20" height="20" fill="currentColor">
            <use xlink:href="/img/icons/bootstrap-icons.svg#eye"/>
        </svg>
    </button>
</div>
