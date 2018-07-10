<?php

namespace App\Services;

class GetPopularCurrenciesCommandHandler
{
    const POPULAR_COUNT = 3;

    public function handle(int $count = self::POPULAR_COUNT): array
    {
        $currencyRepository = app(CurrencyRepositoryInterface::class);
        $currencies = $currencyRepository->findAll();
        usort($currencies, function (Currency $a, Currency $b) {
            return -($a->getPrice() <=> $b->getPrice());
        });

        return array_slice($currencies, 0, $count);
    }
}