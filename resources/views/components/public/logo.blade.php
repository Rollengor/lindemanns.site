<a {{ $attributes->merge(['class' => 'logo']) }} href="{{ route('public.home') }}">
    <img src="/img/logo.svg" alt="{{ config('app.name') }}" class="img-fluid">
</a>
