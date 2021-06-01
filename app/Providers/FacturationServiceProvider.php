<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Library\Services\Facturation;


class FacturationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Library\Services\Facturation', function ($app) {
            return new Facturation();
          });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
