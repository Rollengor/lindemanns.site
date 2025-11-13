@props([
    'viewBox' => '50 50',
    'title' => null,
    'style' => 'primary',
])

<{{ $attributes->has('href') ? 'a' : 'button' }}
    {{ $attributes->merge(['class' => 'btn btn-' . $style]) }}

    @if(!$attributes->has('href') && !$attributes->has('type'))
        type="button"
    @endif
>
    @if($title)
        <span>{{ $title }}</span>
    @endif

    @if($style === 'primary')
        <span class="btn-primary-icon"></span>
    @endif
</{{ $attributes->has('href') ? 'a' : 'button' }}>
