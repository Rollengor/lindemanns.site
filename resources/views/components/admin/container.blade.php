@props([
	'action' => null,
	'method' => 'POST',
	'id' => null,
	'pagination' => null,
	'px' => 'px-3 px-sm-4',
])

@php
    $innerClasses = 'd-flex flex-column w-100 py-4 flex-auto ' . $px;
@endphp

@if($action)
    <form
        {{ $id ? 'id=' . $id : null }}
        action="{{ $action }}"
        method="{{ $method === 'GET' ? 'GET' : 'POST' }}"
        enctype="multipart/form-data"
        data-overlayscrollbars-initialize
        {{ $attributes->merge(['class' => 'flex-auto']) }}
    >
        @csrf
        @method($method)

        <x-admin.field.hidden :name="'active_tab_param'"/>

        <div class="{{ $innerClasses }}">
            {{ $slot }}
        </div>
    </form>

    {{ $pagination }}
@else
    <div data-overlayscrollbars-initialize {{ $attributes->merge(['class' => 'flex-auto']) }}>
        <div class="{{ $innerClasses }}">
            {{ $slot }}
        </div>
    </div>

    {{ $pagination }}
@endif
