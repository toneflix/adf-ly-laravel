<?php

namespace ToneflixCode\AdfLy;

use Illuminate\Support\ServiceProvider;

class AdfLyServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('adf-ly.php'),
            ], 'config');
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'adf-ly');

        // Register the main class to use with the facade
        $this->app->singleton('adf-ly', function () {
            return new AdfLy;
        });
    }
}