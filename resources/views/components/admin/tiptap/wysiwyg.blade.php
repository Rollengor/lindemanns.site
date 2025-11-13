@props([
	'placeholder' => null,
	'name' => '',
	'value' => '',
	'required' => true,
	'buttons' => 'underline, highlight', //  underline, italic, strike, blockquote, subscript, superscript, color, highlight, image, youtube
	'charLimit' => 0,
	'size' => 'md', // sm, md, lg
])

@php
    $extNames = $buttons ? preg_split('/\s*,\s*/', trim($buttons)) : [];
@endphp

<div data-tiptap-wysiwyg
     data-char-limit="{{ $charLimit }}"
     data-buttons="{{ $buttons }}"
     class="d-flex flex-column border rounded bg-light tiptap-wysiwyg tiptap-wysiwyg-size-{{ $size }}"
>
    <textarea
        data-tiptap-content
        class="visually-hidden w-100 bottom-0"
        name="{{ $name }}"
        {{ $required ? 'required' : null }}
    >
        {{ $value }}
    </textarea>

    <div class="w-100 h-100 position-absolute top-0 start-0 tiptap-wysiwyg-panel">
        @if($placeholder)
            <span class="form-control-placeholder glued">{{ $placeholder }} {!! $required ? '<span class="text-danger opacity-75"> *</span>' : null !!}</span>
        @endif

        <div data-tiptap-toolbar class="d-flex gap-2 gap-sm-3 p-2 align-items-start border-bottom bg-light rounded-top tiptap-wysiwyg-toolbar">
            <div class="d-flex flex-wrap flex-fill gap-2 p-1">
                <x-admin.tiptap.button.undo/>
                <x-admin.tiptap.button.redo/>
                <x-admin.tiptap.button.heading/>
                <x-admin.tiptap.button.bold/>
                <x-admin.tiptap.button.align/>
                <x-admin.tiptap.button.list/>
                <x-admin.tiptap.button.link/>

                @foreach(is_array($extNames) ? $extNames : [] as $name)
                    @include('components.admin.tiptap.button.' . $name)
                @endforeach
            </div>

            <div class="p-1">
                <x-admin.tiptap.button.full-screen/>
            </div>
        </div>
    </div>

    <div data-tiptap-character-counter class="d-none tiptap-wysiwyg-character-counter mx-2 mb-1 mt-1 text-end">0 / 0</div>
</div>
