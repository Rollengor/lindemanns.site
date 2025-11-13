@props([
    'name' => '',
    'value' => '#F7F7F7',
    'required' => true,
    'autocomplete' => 'off',
    'placeholder' => null,
    'fieldAttrs' => null,
    'preset' => null,
])

@php
    $preset = $preset ? explode(', ', $preset) : [];
@endphp

@if(count($preset))
    <div data-preset-wrapper class="d-flex gap-3">
@endif

<label {{ $attributes->merge(['class' => 'd-block position-relative' . (count($preset) ? ' flex-auto' : null)]) }}>
    <input
        data-form-control
        class="form-control form-control-color w-100"
        {{ $fieldAttrs ?? null }}
        type="color"
        name="{{ $name }}"
        value="{{ $value }}"
        {{ $required ? 'required' : null }}
        autocomplete="{{ $autocomplete }}"
    />

    @if($placeholder)
        <span class="form-control-placeholder">{{ $placeholder }} {!! $required ? '<span class="text-danger opacity-75"> *</span>' : null !!}</span>
    @endif
</label>

@if(count($preset))
    <div class="dropdown">
        <button class="btn btn-secondary d-flex align-items-center justify-content-center p-2" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            <span style="padding: 2px;" class="d-flex">
                <x-admin.icon :name="'bookmark'"/>
            </span>
        </button>

        <ul class="dropdown-menu shadow-md mt-1">
            @foreach($preset as $item)
                <li>
                    <span data-preset-value="{{ $item }}" class="d-flex align-items-center gap-3 dropdown-item cursor-pointer">
                        <span style="background-color: {{ $item }};" class="d-block p-2 rounded-1 border border-secondary border-opacity-25"></span> {{ $item }}
                    </span>
                </li>
            @endforeach
        </ul>
    </div>

    </div>
@endif
