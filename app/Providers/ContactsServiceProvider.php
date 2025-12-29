<?php

namespace App\Providers;

use App\Models\Page;
use Illuminate\Support\ServiceProvider;
use \Illuminate\Support\Facades;
use Illuminate\View\View;

class ContactsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Facades\View::composer(['public.*'], function (View $view) {
            $contacts = Page::where('slug', 'contacts')->first();

            $view->with('contacts', $contacts);
        });
    }
}
