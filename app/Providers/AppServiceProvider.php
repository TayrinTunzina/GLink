<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        $campaigns = DB::table('campaigns')->get();
        View::share('campaigns', $campaigns);

        $donation = DB::table('donations')->get();
        View::share('donations', $donation);
    }
}
