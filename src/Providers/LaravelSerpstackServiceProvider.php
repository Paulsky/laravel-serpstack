<?php

namespace WDevs\LaravelSerpstack\Providers;

use Illuminate\Support\ServiceProvider;
use WDevs\LaravelSerpstack\LaravelSerpstack;

class LaravelSerpstackServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        /*
         * Optional methods to load your package assets
         */
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'laravel-serpstack');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'laravel-serpstack');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../../config/serpstack.php' => config_path('serpstack.php'),
            ], 'config');

            // Publishing the views.
            /*$this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/laravel-serpstack'),
            ], 'views');*/

            // Publishing assets.
            /*$this->publishes([
                __DIR__.'/../resources/assets' => public_path('vendor/laravel-serpstack'),
            ], 'assets');*/

            // Publishing the translation files.
            /*$this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/laravel-serpstack'),
            ], 'lang');*/

            // Registering package commands.
            // $this->commands([]);
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../../config/serpstack.php', 'laravel-serpstack');

        // Register the main class to use with the facade
        $this->app->singleton('laravel-serpstack', function () {
            return new LaravelSerpstack;
        });
    }
}
