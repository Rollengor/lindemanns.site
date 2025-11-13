@props([
    'name' => null,
    'options' => collect([]),
    'placeholder' => null,
    'required' => true,
    'multiple' => false,
    'withSearch' => false,
])

<div {{ $attributes->merge(['class' => 'position-relative']) }}>
    <select
        data-form-control
        data-form-select
        {{ $withSearch ? 'data-show-search' : null }}
        name="{{ $name }}"
        {{ $required ? 'required' : null }}
        {{ $multiple ? 'multiple' : null }}
    >
        @if(!$multiple)
            <option data-placeholder="true"></option>
        @endif
        {{ $slot }}
    </select>

    @if($placeholder)
        <span class="form-control-placeholder">{{ $placeholder }} {!! $required ? '<span class="text-danger opacity-75"> *</span>' : null !!}</span>
    @endif
</div>
