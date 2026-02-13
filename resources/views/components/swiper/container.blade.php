@props([
    'withPagination' => false,
    'withNavigation' => false,
    'withScrollbar' => false,
])

<div {{ $attributes->merge(['class' => 'swiper']) }}>
    <div class="swiper-wrapper">
        {{ $slot }}
    </div>

    @if ($withPagination)
        <div class="swiper-pagination"></div>
    @endif

    @if ($withNavigation)
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    @endif

    @if ($withNavigation)
        <div class="swiper-scrollbar"></div>
    @endif
</div>
