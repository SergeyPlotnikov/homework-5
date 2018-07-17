<?php

namespace App\Services;

class GetMostChangedCurrencyCommandHandler
{
    private $currencyRepository;

    public function __construct(CurrencyRepositoryInterface $currencyRepository)
    {
        $this->currencyRepository = $currencyRepository;
    }

    public function handle(): Currency
    {
        $currencies = $this->currencyRepository->findAll();
        $mostChangedCurrency = $currencies[0];
        for ($i = 1; $i < count($currencies); $i++) {
            if ($mostChangedCurrency->getDailyChangePercent() < $currencies[$i]->getDailyChangePercent()) {
                $mostChangedCurrency = $currencies[$i];
            }
        }
        return $mostChangedCurrency;
    }
}