@props([
	'type' => 'button',
	'btn' => 'btn-secondary',
	'withLoader' => false,
	'iconName' => null,
	'iconWidth' => 20,
	'iconHeight' => 20,
	'title' => null,
	'shortTitle' => null,
	'longTitle' => null,
	'href' => null,
	'form' => null,
	'target' => null,
	'withMiniStyle' => false,
	'btnInFieldGroup' => false,
])

@if($href)
    <a
        @if($btnInFieldGroup)
            style="padding: 10px;"
        @endif
        href="{{ $href }}"
        {{ $target ? 'target=' . $target : null }}
        {{ $attributes->merge(['class' => 'btn d-flex align-items-center justify-content-center gap-3 ' . $btn . ($withLoader ? ' submit-loader' : null) . ($withMiniStyle && $iconName && !$btnInFieldGroup ? ' px-2 px-md-3' : null)]) }}
    >
@else
    <button
        @if($btnInFieldGroup)
            style="padding: 10px;"
        @endif
        type="{{ $type }}"
        {{ $form ? 'form=' . $form : null }}
        {{ $withLoader && $form && $type === 'submit' ? 'data-submit-loader' : null }}
        {{ $attributes->merge(['class' => 'btn d-flex align-items-center justify-content-center gap-3 ' . $btn . ($withLoader ? ' submit-loader' : null) . ($withMiniStyle && $iconName && !$btnInFieldGroup ? ' px-2 px-md-3' : null)]) }}
    >
@endif

    @if($iconName)
        <x-admin.icon :name="$iconName" :width="$iconWidth" :height="$iconHeight" />
    @endif

    @if($shortTitle && $longTitle)
        <span class="{{ $withMiniStyle && $iconName ? 'd-none d-md-inline' : null }}">
            <span class="d-md-none">{{ $shortTitle }}</span>
            <span class="d-none d-md-inline">{{ $longTitle }}</span>
        </span>
    @elseif($title)
        <span class="{{ $withMiniStyle && $iconName ? 'd-none d-md-inline' : null }}">{{ $title }}</span>
    @endif

    @if($withLoader)
        <span class="submit-loader-spinner">
            <span class="spinner-border m-auto text-white"></span>
        </span>
    @endif

@if($href)
    </a>
@else
    </button>
@endif
