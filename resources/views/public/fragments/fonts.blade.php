@php
    $fonts = [
        [
            'name' => 'HeliosExt',
            'weights' => [
                'Regular' => 400,
                'Light' => 300,
            ],
        ],
    ];
@endphp

@foreach($fonts as $font)
    @foreach($font['weights'] as $weight => $value)
        <link rel="preload" href="/fonts/{{ $font['name'] }}-{{ $weight }}.woff" as="font" type="font/woff" crossorigin="anonymous">
        <link rel="preload" href="/fonts/{{ $font['name'] }}-{{ $weight }}.woff2" as="font" type="font/woff2" crossorigin="anonymous">
    @endforeach
@endforeach

<style>
    @foreach($fonts as $font)
        @foreach($font['weights'] as $weight => $value)
            @font-face {
                font-family: {{ $font['name'] }};
                font-style: normal;
                font-weight: {{ $value }};
                font-display: swap;
                src: url("/fonts/{{ $font['name'] }}-{{ $weight }}.woff") format("woff"), url("/fonts/{{ $font['name'] }}-{{ $weight }}.woff2") format("woff2");
            }
        @endforeach
    @endforeach
</style>
