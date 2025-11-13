@props([
	'ratio' => '4x3',
	'src' => null,
	'fit' => 'cover',
	'youtubeVideoId' => null,
	'position' => null,
])

@php
    if (!$src) {
        if ($youtubeVideoId) {
            $src = 'https://i3.ytimg.com/vi/' . $youtubeVideoId . '/maxresdefault.jpg';
        } else {
            $ratioExplode = explode('x', $ratio);
            $ratioWidth = $ratioExplode[0];
            $ratioHeight = $ratioExplode[1];

            $src = '/img/default' . ($ratioWidth < $ratioHeight ? '-vertical' : '') . '.svg';
        }
    }
@endphp

<picture {{ $attributes->merge(['class' => 'd-block ratio ratio-' . $ratio]) }}>
    <img
        @if($position)
            style="object-position: {{ $position }}"
        @endif
        src="{{ $src }}"
        alt="image" class="position-absolute img-{{ $fit }}"
    >
</picture>
