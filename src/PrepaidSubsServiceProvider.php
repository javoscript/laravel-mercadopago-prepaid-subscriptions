<?php

namespace Javoscript\PrepaidSubs;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

use Javoscript\PrepaidSubs\PrepaidSubs;


class PrepaidSubsServiceProvider extends ServiceProvider
{

    public function boot()
    {
        // Publish config
        $this->publishes([
            __DIR__.'/../config/prepaid-subs.php' => base_path('config/prepaid-subs.php'),
        ], 'config');

        // Load the package's views
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'prepaid-subs');
        // Publish views
        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/prepaid-subs'),
        ], 'views');

        // View composer for the included plans partial
        View::composer('prepaid-subs::partials.plans', function ($view) {
            $view->with('prepaid_subs__plans', (new PrepaidSubs())->getPlans());
        });

        // Load package's routes
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->loadRoutesFrom(__DIR__.'/../routes/api.php');

        // Load package's migrations
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        // OR publish them (any benefits?)
        /* $this->publishes([ */
        /*     __DIR__.'/../database/migrations/' => database_path('migrations') */
        /* ], 'migrations'); */

        // Publish puclic assets
        /* $this->publishes([ */
        /*     __DIR__.'/path/to/assets' => public_path('vendor/prepaid-subs'), */
        /* ], 'public'); */
    }

    public function register()
    {
        // Bind a Facade
        $this->app->bind('prepaid-subs', function() {
            return new PrepaidSubs();
        });

        // Add package config
        $this->mergeConfigFrom(__DIR__.'/../config/prepaid-subs.php', 'prepaid-subs');
    }

}
