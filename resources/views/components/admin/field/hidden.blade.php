@props([
    'name' => '',
    'value' => '',
    'required' => true,
])

<input
    type="hidden"
    name="{{ $name }}"
    value="{{ $value }}"
    {{ $required ? 'required' : null }}
/>
