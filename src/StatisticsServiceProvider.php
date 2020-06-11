<?php

namespace Marshmallow\Statistics;

use Illuminate\Database\Eloquent\Factory;
use Illuminate\Support\ServiceProvider;

class StatisticsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $source = __DIR__ . '/../config/statistics.php';
        $this->mergeConfigFrom(
            $source, 'statistics'
        );
        $this->app->make('Marshmallow\Statistics\Http\Statistics\Controllers\StatisticsController');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        /**
         * Config
         */
        $this->publishes([
            __DIR__ . '/../config/statistics.php' => config_path('statistics.php')
        ], 'config');

        /**
         * Routes
         */
        $this->loadRoutesFrom(__DIR__.'/routes.php');

        /**
         * Commands
         */
        if ($this->app->runningInConsole()) {
            $this->commands([
                \Marshmallow\Statistics\Console\Commands\SetupCommand::class,
            ]);
        }
    }
}
