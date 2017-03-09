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
        if ( ! $this->migrationHasAlreadyBeenPublished() ) {
            // Publish migration
            $timestamp = date('Y_m_d_His', time());

            $this->publishes([
                __DIR__ . "/../../migrations/create_lara_spy_table.stub" => database_path("/migrations/{$timestamp}_create_lara_spy_table.php"),
            ], 'migrations');
        }
    }


    /**
     * @return bool
     */
    protected function migrationHasAlreadyBeenPublished()
    {
        $files = glob(database_path('/migrations/*_create_lara_spy_table.php'));

        return count($files) > 0;
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
