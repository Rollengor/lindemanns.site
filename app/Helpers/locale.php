<?php

use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

if (!function_exists('supported_locales')) {
    function supported_locales()
    {
        return LaravelLocalization::getSupportedLocales();
    }
}

if (!function_exists('supported_languages_keys')) {
    function supported_languages_keys()
    {
        return LaravelLocalization::getSupportedLanguagesKeys();
    }
}

if (!function_exists('current_locale')) {
    function current_locale()
    {
        return LaravelLocalization::getCurrentLocale();
    }
}

if (!function_exists('localized_url')) {
    function localized_url($localeCode, $url = null, $attributes = [], $forceDefaultLocation = false)
    {
        return LaravelLocalization::getLocalizedURL($localeCode, $url, $attributes, $forceDefaultLocation);
    }
}
