<div class="d-flex flex-column gap-4">
    <!-- linkedin -->
    <x-admin.field.text
        :name="'content_data['. config('app.fallback_locale') .'][socials][linkedin]'"
        :value="old('content_data.'. config('app.fallback_locale') .'.socials.linkedin', data_get($page->getTranslation('content_data', config('app.fallback_locale')), 'socials.linkedin'))"
        :placeholder="'LinkedIn'"
        :required="false"
    />

    <!-- instagram -->
    <x-admin.field.text
        :name="'content_data['. config('app.fallback_locale') .'][socials][instagram]'"
        :value="old('content_data.'. config('app.fallback_locale') .'.socials.instagram', data_get($page->getTranslation('content_data', config('app.fallback_locale')), 'socials.instagram'))"
        :placeholder="'Instagram'"
        :required="false"
    />

    <!-- youtube -->
    <x-admin.field.text
        :name="'content_data['. config('app.fallback_locale') .'][socials][youtube]'"
        :value="old('content_data.'. config('app.fallback_locale') .'.socials.youtube', data_get($page->getTranslation('content_data', config('app.fallback_locale')), 'socials.youtube'))"
        :placeholder="'YouTube'"
        :required="false"
    />
</div>
