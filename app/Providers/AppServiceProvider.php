<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

        //URL::forceScheme('https');

    }
        

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /*if (config('app.env') === 'production') {
            \url('https');
        }*/

        /*if (config('APP_ENV') === 'production') {
            URL::forceScheme('https');
        } else if (config('APP_ENV') === 'local') {
            URL::forceScheme('http');
        }*/

        //URL::forceScheme('https');

        Schema::defaultStringLength(191);

    }
}
