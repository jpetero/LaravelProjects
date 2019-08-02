<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

// Bring this to set the string length otherwise it will be 255
// use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //This can run without inclusion
        // Schema::defaultStringLength(191);
    }
}
