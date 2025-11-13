@extends('admin.layouts.base')

@section('title', __('titles.main') . ' - ' . config('app.name'))

@section('content')
    <x-admin.container>
        <div class="d-flex flex-column gap-4">
            <x-admin.tiptap.wysiwyg
                :placeholder="'Description'"
            />

            {{--<x-admin.field.wysiwyg
                :placeholder="'Description'"
            />--}}
        </div>

        <textarea id="codeView" style="height: 400px; margin-top: 1em;"></textarea>
    </x-admin.container>
@endsection
