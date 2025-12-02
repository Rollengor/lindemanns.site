<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Faker;

class FakerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        if (app()->environment(['local', 'testing'])) {
            $this->app->singleton(\Faker\Generator::class, function ($app) {
                $faker = Faker\Factory::create($app['config']->get('app.faker_locale', 'en_US'));
                $faker->addProvider(new \Bluemmb\Faker\PicsumPhotosProvider($faker));

                return $faker;
            });
        }
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
