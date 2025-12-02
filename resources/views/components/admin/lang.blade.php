@props([
	'withIcon' => false,
])

<div {{ $attributes->merge(['class' => 'dropdown dropdown-center']) }}>
    <button class="btn border-0 d-flex align-items-center justify-content-center px-2 py-0 text-uppercase fw-bold gap-1" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        @if($withIcon)
            <x-admin.icon :name="'globe2'" :with="16" :height="16" />
        @endif
        <span>{{ current_locale() }}</span>
    </button>

    <ul class="dropdown-menu shadow-md mt-1 text-uppercase text-center">
        @foreach(supported_languages_keys() as $localeCode)
            @if(current_locale() !== $localeCode)
                <li>
                    <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ localized_url($localeCode) }}" class="dropdown-item">{{ $localeCode }}</a>
                </li>
            @endif
        @endforeach
    </ul>
</div>
