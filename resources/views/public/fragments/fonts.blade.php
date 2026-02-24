@php
    $fonts = [
        [
            'name' => 'Pangea-Variable',
            'weight' => '300 700',
        ],
        [
            'name' => 'Nice-Variable',
            'weight' => '200 900',
        ],
    ];
@endphp

{{-- @foreach ($fonts as $font)
    <link
        rel="preload"
        href="/fonts/{{ $font['name'] }}.woff2"
        as="font"
        type="font/woff2"
        crossorigin="anonymous"
    >
@endforeach --}}

<style>
    @foreach ($fonts as $font)
        @font-face {
            font-family: "{{ $font['name'] }}";
            font-style: normal;
            font-weight: {{ $font['weight'] }};
            font-display: swap;
            src: url("/fonts/{{ $font['name'] }}.woff2") format("woff2");
        }
    @endforeach
</style>
