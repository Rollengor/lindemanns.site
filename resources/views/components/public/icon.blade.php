@props([
    'viewBox' => '50 50',
    'name' => null,
])

<svg {{ $attributes->merge(['class' => 'icon']) }} viewBox="0 0 {{ $viewBox }}"><use xlink:href="/img/icons/sprite.svg?v=2#{{ $name }}"/></svg>
