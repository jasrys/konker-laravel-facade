<?php

namespace Jasrys\KonkerLaravelFacade;

use Illuminate\Support\ServiceProvider;

class KonkerLaravelFacadeServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(): void
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'jasrys');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'jasrys');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/konker-laravel-facade.php', 'konker-laravel-facade');

        // Register the service the package provides.
        // $this->app->singleton('konker-laravel-facade', function ($app) {
        //     return new KonkerLaravelFacade;
        // });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['konker-laravel-facade'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole(): void
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/konker-laravel-facade.php' => config_path('konker-laravel-facade.php'),
        ], 'konker-laravel-facade.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/jasrys'),
        ], 'konker-laravel-facade.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/jasrys'),
        ], 'konker-laravel-facade.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/jasrys'),
        ], 'konker-laravel-facade.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
