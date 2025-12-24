@props([
    'name' => '',
    'placeholder' => null,
    'value' => 1000,
    'fieldAttrs' => null,
    'accept' => null,
    'multiple' => false,
    'required' => true,
])

<div {{ $attributes->merge(['class' => 'd-block position-relative']) }}>
    <input
        data-form-control
        class="form-control"
        {{ $fieldAttrs ?? null }}
        type="file"
        name="{{ $name }}"
        {{ $multiple ? 'multiple' : null }}
        {{ $required ? 'required' : null }}
        autocomplete="off"
    />

    @if($placeholder)
        <span class="form-control-placeholder">{{ $placeholder }} {!! $required ? '<span class="text-danger opacity-75"> *</span>' : null !!}</span>
    @endif

    <button 
        data-form-control-clear-button
        type="button" 
        class="d-flex align-items-center justify-content-center btn btn-light rounded-pill p-1 position-absolute top-50 start-100 translate-middle"
    >
        <x-admin.icon :name="'x'" :width="20" :height="20" />
    </button>
</label>

{{--<div {{ $attributes->merge(['class' => 'flex flex-col gap-1 ' . ($name && $errors->has($name) ? 'text-red-600 dark:text-red-500' : null) ]) }}>
    @if($title)
        <label for="{{ $id }}" class="block font-semibold">
            {{ $title }}

            @if($required)
                <span class="text-base leading-none text-red-600 dark:text-red-400">*</span>
            @endif
        </label>
    @endif

    <div class="flex flex-col gap-1">
        <div class="flex gap-3">
            <div class="w-full flex-[1_0_0]">
                <input
                    id="{{ $id }}"
                    type="file"
                    name="{{ $name }}"
                    accept="{{ $accept }}"
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-md file:font-normal file:py-2 file:pr-3 file:pl-6 file:me-3 file:-ms-3 cursor-pointer bg-gray-50 focus:outline-none {{ $name && $errors->has($name) ? 'is-invalid' : null }} [&.is-invalid]:bg-red-50 [&.is-invalid]:border-red-500 [&.is-invalid]:text-red-900 [&.is-invalid]:placeholder-red-700 [&.is-invalid]:focus:border-red-500"
                    {{ $required ? 'required' : null }}
                    {{ $multiple ? 'multiple' : null }}
                >
            </div>
        </div>

        @if($help)
            <p class="text-gray-500 dark:text-gray-300">{{ strtoupper($help) }}</p>
        @endif
    </div>

    @if ($name)
        @error($name)
        <p class="text-red-600 dark:text-red-500">{{ $message }}</p>
        @enderror
    @endif
</div>--}}
