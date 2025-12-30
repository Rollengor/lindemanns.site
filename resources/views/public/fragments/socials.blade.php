<div class="socials">
    @foreach(data_get($contacts->getTranslation('content_data', config('app.fallback_locale')), 'socials', []) as $socialName => $url)
        <a href="{{ $url }}" target="_blank" class="is-{{ $socialName }}"></a>
    @endforeach
</div>
