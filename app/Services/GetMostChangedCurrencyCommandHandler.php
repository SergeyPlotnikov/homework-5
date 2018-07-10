<?php

namespace App\Services;

class GetMostChangedCurrencyCommandHandler
{
    public function handle(): Currency
    {
        $currencyRepository = app(CurrencyRepositoryInterface::class);
        $currencies = $currencyRepository->findAll();
        $mostChangedCurrency = $currencies[0];
        for ($i = 1; $i < count($currencies); $i++) {
            if ($mostChangedCurrency->getDailyChangePercent() < $currencies[$i]->getDailyChangePercent()) {
                $mostChangedCurrency = $currencies[$i];
            }
        }
        return $mostChangedCurrency;
    }
}