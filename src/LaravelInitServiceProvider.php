<?php
/**
 * Part of the Laravel Init package by Coder Studios.
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the terms of the MIT license https://opensource.org/licenses/MIT
 *
 * @version    1.0.0
 *
 * @author     Coder Studios Ltd
 * @license    MIT https://opensource.org/licenses/MIT
 * @copyright  (c) 2020, Coder Studios Ltd
 *
 * @see       https://www.coderstudios.com
 */

namespace CoderStudios\LaravelInit;

use Illuminate\Support\ServiceProvider;

class LaravelInitServiceProvider extends ServiceProvider
{
    /**
     * Boot the service provider.
     */
    public function boot()
    {
        $this->registerRoutes();

        $this->loadMigrationsFrom(__DIR__.'/database/migrations');

        $this->publishes([
            __DIR__.'/../config/laravelinit.php' => config_path('laravelinit.php'),
        ], 'config');

        /*
        $this->publishes([
            __DIR__.'/../../../resources/assets' => resource_path('vendor/laravelinit'),
        ], 'resources');
        */

        $this->publishes([
            __DIR__.'/database/migrations' => database_path('/migrations'),
        ], 'migrations');

        $this->commands([
            Commands\Install::class,
            Commands\Update::class,
            Commands\Reset::class,
            Commands\DBBackup::class,
        ]);
    }

    /**
     * Register any application services.
     */
    public function register()
    {
        $this->configure();
    }

    /**
     * Register the package routes.
     */
    protected function registerRoutes()
    {
    }

    /**
     * Setup the configuration.
     */
    protected function configure()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/laravelinit.php',
            'laravelinit'
        );
    }
}
