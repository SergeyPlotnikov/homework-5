<?php

namespace App\Providers;

use App\Services\CurrencyGenerator;
use App\Services\CurrencyRepository;
use App\Services\CurrencyRepositoryInterface;
use App\Services\GetCurrenciesCommandHandler;
use App\Services\GetMostChangedCurrencyCommandHandler;
use App\Services\GetPopularCurrenciesCommandHandler;
use Illuminate\Support\ServiceProvider;

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
        $this->app->singleton(CurrencyRepositoryInterface::class, function ($app) {
            return new CurrencyRepository(CurrencyGenerator::generate());
        });
    }
}
