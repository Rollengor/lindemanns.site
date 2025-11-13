@props([
    'name' => '',
    'value' => '',
    'required' => true,
    'autocomplete' => 'off',
    'placeholder' => null,
    'fieldAttrs' => null,
    'pattern' => '.*@.*',
])

<label {{ $attributes->merge(['class' => 'd-block position-relative']) }}>
    <input
        data-form-control
        class="form-control"
        {{ $fieldAttrs ?? null }}
        type="email"
        name="{{ $name }}"
        value="{{ $value }}"
        pattern="{{ $pattern }}"
        {{ $required ? 'required' : null }}
        autocomplete="{{ $autocomplete }}"
    />

    @if($placeholder)
        <span class="form-control-placeholder">{{ $placeholder }} {!! $required ? '<span class="text-danger opacity-75"> *</span>' : null !!}</span>
    @endif
</label>
