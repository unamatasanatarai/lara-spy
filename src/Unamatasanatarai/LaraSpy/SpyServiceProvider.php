<?php

namespace Unamatasanatarai\LaraSpy;

use Illuminate\Support\ServiceProvider;

class SpyServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;


    /**
     * Bootstrap the application events.
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/migrations/');
    }


    /**
     * Register the service provider.
     */
    public function register()
    {
        $this->app->bind('spy', 'Unamatasanatarai\LaraSpy\SpySupervisor');

        $this->app->bind('Unamatasanatarai\LaraSpy\Handler\HandlerInterface',
            'Unamatasanatarai\LaraSpy\Handler\EloquentHandler');
    }


    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}
