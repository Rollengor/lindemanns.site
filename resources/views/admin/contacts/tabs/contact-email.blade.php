<div class="d-flex flex-column gap-4">
    <!-- contact email -->
    <x-admin.field.email
        :name="'content_data['. config('app.fallback_locale') .'][contact_email]'"
        :value="old('content_data.'. config('app.fallback_locale') . '.contact_email', data_get($page->getTranslation('content_data', config('app.fallback_locale')), 'contact_email'))"
        :placeholder="__('admin.email')"
    />
</div>
