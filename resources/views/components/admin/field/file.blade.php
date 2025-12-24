@props([
    'title' => null,
    'name' => null,
    'accept' => null,
    'help' => null,
    'multiple' => false,
    'dynamiced' => false,
    'required' => true,
])

@php
    $id = uniqid('field_');
@endphp

<div {{ $attributes->merge(['class' => 'flex flex-col gap-1 ' . ($name && $errors->has($name) ? 'text-red-600 dark:text-red-500' : null) ]) }}>
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

            @if($dynamiced)
                <x-dynamic-fields.action/>
            @endif
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
</div>
