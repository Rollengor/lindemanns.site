@props([
    'method' => null,
    'isUpdateFromView' => false,
    'updateIdSection' => null,
])

<form
    {{ $attributes->merge(['class' => 'd-flex flex-column gap-4']) }}
    id="controlForm"

    @if($isUpdateFromView && $updateIdSection)
        data-ajax-with-update-from-view
        data-update-id-section="{{ $updateIdSection }}"
    @endif

    action="#"
    method="{{ $method !== 'GET' ? 'POST' : 'GET' }}"
    enctype="multipart/form-data"
>
    @csrf
    @method($method)

    {{ $slot }}
</form>
