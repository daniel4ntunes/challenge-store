<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Carbon\Carbon;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        Carbon::setLocale('pt_BR');
    }

    /**
     * Register any application services.
     */
    public function register()
    {
    }
}
