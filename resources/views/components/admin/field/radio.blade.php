@props([
    'name' => '',
    'value' => '',
    'required' => true,
    'title' => null,
    'checked' => false,
    'type' => null, // button
    'fieldAttrs' => null,
    'btnClasses' => null,
])

@if($type === 'button')
    <label {{ $attributes }}>
        <input
            {{ $fieldAttrs ?? null }}
            type="radio"
            class="btn-check"
            name="{{ $name }}"
            value="{{ $value }}"
            autocomplete="off"
            {{ $required ? 'required' : null }}
            {{ $checked ? 'checked' : null }}
        />
        <span class="w-100 btn {{ $btnClasses ?? 'btn-outline-secondary' }}">{{ $title }}</span>

        {{ $slot }}
    </label>
@else
    <label {{ $attributes->merge(['class' => 'form-check cursor-pointer']) }}>
        <input
            class="form-check-input"
            type="radio"
            name="{{ $name }}"
            value="{{ $value }}"
            {{ $required ? 'required' : null }}
            {{ $checked ? 'checked' : null }}
        />

        <span class="form-check-label">{{ $title }}</span>
    </label>
@endif
