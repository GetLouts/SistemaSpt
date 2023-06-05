<?php

namespace App\Providers;

use Illuminate\Pagination\PaginationState;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator;

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
        Schema::defaultStringLength(191);
        Paginator::useBootstrap();

        $this->publishes([
            __DIR__.'/../../node_modules/chart.js/dist' => public_path('plugins/chart.js'),
            __DIR__.'/../../node_modules/jquery/dist' => public_path('plugins/jquery'),
        ], 'laravel-assets');
    }
}
