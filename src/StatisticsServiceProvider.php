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
        $source = dirname(__DIR__) . '/src/config/statistics.php';
        $this->mergeConfigFrom(
            $source, 'statistics'
        );
        $this->app->make('Marshmallow\Statistics\App\Http\Statistics\Controllers\StatisticsController');
        $this->loadViewsFrom(__DIR__.'/views/statistics', 'statistics');

        /**
         * Merge in the config
         */
        // $this->mergeConfigFrom(
        //     __DIR__.'/config/ecommerce.php', 'ecommerce'
        // );
    }

    protected function setUpConfig()
    {
        // $source = dirname(__DIR__) . '/src/config/ecommerce.php';
        // $this->publishes([$source => config_path('ecommerce.php')], 'config');
        // $this->mergeConfigFrom($source, 'ecommerce');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->setUpConfig();

        /**
         * Views
         */
        $this->loadViewsFrom(__DIR__.'/views', 'statistics');
        $this->publishes([
            __DIR__.'/views' => resource_path('views/marshmallow/statistics'),
        ], 'views');

        /**
         * Migrations
         */
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');


        /**
         * Translations
         */
        $this->loadTranslationsFrom(__DIR__.'/resources/lang', 'statistics');
        $this->publishes([
            __DIR__.'/resources/lang' => resource_path('lang/marshmallow/statistics')
        ], 'translations');

        /**
         * Config
         */
        $this->publishes([
            __DIR__.'/config/statistics.php' => config_path('statistics.php')
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
                \Marshmallow\Statistics\App\Console\Commands\SetupCommand::class,
            ]);
        }
        $this->app->make(Factory::class)->load(__DIR__.'/database/factories');
    }
}
