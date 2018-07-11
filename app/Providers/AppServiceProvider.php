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
        $this->app->singleton(CurrencyRepositoryInterface::class, CurrencyRepository::class);
        $this->app->singleton(CurrencyRepository::class, function ($app) {
            return new CurrencyRepository(CurrencyGenerator::generate());
        });

        $this->app->bind('getCurrencies', function ($app) {
            return new GetCurrenciesCommandHandler();
        });

        $this->app->bind('getMostChangedCurrency', function ($app) {
            return new GetMostChangedCurrencyCommandHandler();
        });

        $this->app->bind('getPopularCurrencies', function ($app) {
            return new GetPopularCurrenciesCommandHandler();
        });

    }
}
