<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\ReservationSlotsManager;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->singleton(ReservationSlotsManager::class, function ($app) {
            return new ReservationSlotsManager(8, 18, 30);
        });
    }
}
