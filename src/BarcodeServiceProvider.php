<?php

namespace AgeekDev\Barcode;

use Illuminate\Support\ServiceProvider;

class BarcodeServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/barcode.php', 'barcode');

        $this->app->bind('laravel-barcode', function ($app) {
            return new BarcodeManager($app);
        });
    }

    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/../config/barcode.php' => config_path('barcode.php'),
        ], 'laravel-barcode-config');
    }
}
