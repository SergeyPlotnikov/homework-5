<?php

namespace App\Services;

class GetCurrenciesCommandHandler
{
    public function handle(): array
    {
        $currencyRepository = app(CurrencyRepositoryInterface::class);

//        $currenciesList = [];
//        foreach ($currencyRepository->findAll() as $currency) {
//            array_push($currenciesList, $currency);
//        }
//        return $currenciesList;
        return $currencyRepository->findAll();
    }
}