@props([
    'title' => null,
])

<div id="mainPanel" class="main-panel d-flex flex-wrap align-items-center px-3 px-sm-4 border-bottom border-dark border-opacity-25 shadow-sm bg-white">
    <div class="py-2 pe-2 fs-4 lh-1 fw-semibold flex-auto">{{ $title }}</div>

    @if ($slot->isEmpty())
        <div class="py-3">&#160;</div>
    @else
        <div class="d-flex align-items-center py-2 overflow-x-auto px-3 mx-n3 gap-3">
            {{ $slot }}
        </div>
    @endif
</div>
