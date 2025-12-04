@props([
    'name' => '',
    'disabledValue' => '0',
    'activeValue' => '1',
    'required' => true,
    'title' => null,
    'checked' => false,
])

<div class="form-radio-switch">
    <input
        class="form-radio-switch-input form-radio-switch-input-disabled"
        type="radio"
        value="{{ $disabledValue }}"
        name="{{ $name }}"
        {{ !$checked ? 'checked' : null }}
        {{ $required ? 'required' : null }}
    >
    <input
        class="form-radio-switch-input form-radio-switch-input-active"
        type="radio"
        value="{{ $activeValue }}"
        name="{{ $name }}"
        {{ $checked ? 'checked' : null }}
        {{ $required ? 'required' : null }}
    >

    <span class="form-check-label">{{ $title }}</span>
</div>
