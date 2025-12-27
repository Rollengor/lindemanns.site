@props([
    'name' => '',
    'value' => '',
    'required' => true,
    'autocomplete' => 'off',
    'placeholder' => null,
    'fieldAttrs' => null,
    'pattern' => '.{2,}',
])

<label {{ $attributes->merge(['class' => 'd-block position-relative']) }}>
    <textarea
        data-form-control
        class="form-control"
        {{ $fieldAttrs ?? null }}
        type="text"
        name="{{ $name }}"
        {{ $pattern ? 'pattern=' . $pattern : null }}
        {{ $required ? 'required' : null }}
        autocomplete="{{ $autocomplete }}"
        rows="3"
    >{{ $value }}</textarea>

    @if($placeholder)
        <span class="form-control-placeholder">{{ $placeholder }} {!! $required ? '<span class="text-danger opacity-75"> *</span>' : null !!}</span>
    @endif
</label>
