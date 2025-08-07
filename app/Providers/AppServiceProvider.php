<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->app->singleton(\App\Clients\WeatherConfig::class, function ($app) {
            return new \App\Clients\WeatherConfig([
                'base_uri' => 'http://api.weatherstack.com/',
                'timeout'  => 5.0,
            ]);
        });
    }
}
