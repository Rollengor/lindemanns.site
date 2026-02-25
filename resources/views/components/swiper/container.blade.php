@props([
    'withPagination' => false,
    'withNavigation' => false,
    'withScrollbar' => false,
    'withNavbarContainer' => false,
])

<div {{ $attributes->merge(['class' => 'swiper']) }}>
    <div class="swiper-wrapper">
        {{ $slot }}
    </div>

    @if ($withNavbarContainer)
        <div class="swiper-navbar-container">
    @endif

    @if ($withPagination)
        <div class="swiper-pagination"></div>
    @endif

    @if ($withNavigation)
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    @endif

    @if ($withScrollbar)
        <div class="swiper-scrollbar"></div>
    @endif

    @if ($withNavbarContainer)
</div>
@endif
</div>
