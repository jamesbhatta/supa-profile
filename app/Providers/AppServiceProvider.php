<?php

namespace App\Providers;

use App\FiscalYear;
use App\Observers\FiscalYearObserver;
use App\Observers\OrganizationObserver;
use App\Organization;
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
    public function boot()
    {
        FiscalYear::observe(FiscalYearObserver::class);
    }
}
