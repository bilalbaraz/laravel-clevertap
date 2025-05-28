<?php

namespace BilalBaraz\LaravelCleverTap;

use Illuminate\Support\ServiceProvider;

class LaravelCleverTapServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/clevertap.php', 'clevertap'
        );

        $this->app->singleton('clevertap', function ($app) {
            $config = $app['config']->get('clevertap');
            return new CleverTap($config);
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/clevertap.php' => config_path('clevertap.php'),
        ], 'config');
    }
}