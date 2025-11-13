@props([
    'name' => '',
    'value' => '',
    'required' => true,
    'title' => null,
    'checked' => false,
    'fieldAttrs' => null,
])

<label {{ $attributes->merge(['class' => 'form-check form-switch cursor-pointer']) }}>
    <input
        class="form-check-input cursor-pointer"
        {{ $fieldAttrs ?? null }}
        type="checkbox"
        name="{{ $name }}"
        value="{{ $value }}"
        {{ $required ? 'required' : null }}
        {{ $checked ? 'checked' : null }}
    />

    <span class="form-check-label">{{ $title }}</span>
</label>
