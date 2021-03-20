<?php

namespace App\Providers;

use App\Models\Woman;
use App\Observers\WomanObserver;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        Woman::observe(WomanObserver::class);
    }
}
