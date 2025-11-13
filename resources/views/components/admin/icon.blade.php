@props([
	'width' => 20,
	'height' => 20,
	'name' => null,
	'url' => null,
])

<svg {{ $attributes->merge(['class' => 'bi']) }} width="{{ $width }}" height="{{ $height }}" fill="currentColor">
    <use xlink:href="{{$url ?? '/img/icons/bootstrap-icons.svg#' . $name }}"/>
</svg>
