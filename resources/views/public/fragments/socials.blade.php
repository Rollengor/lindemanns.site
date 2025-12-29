<div class="socials">
    @foreach(data_get($contacts->content_data, 'socials', []) as $socialName => $url)
        <a href="{{ $url }}" target="_blank" class="is-{{ $socialName }}"></a>
    @endforeach
</div>
