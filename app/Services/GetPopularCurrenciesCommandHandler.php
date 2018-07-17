<?php

namespace App\Services;

class GetPopularCurrenciesCommandHandler
{
    private $currencyRepository;

    const POPULAR_COUNT = 3;

    public function __construct(CurrencyRepositoryInterface $currencyRepository)
    {
        $this->currencyRepository = $currencyRepository;
    }

    public function handle(int $count = self::POPULAR_COUNT): array
    {
        $currencies = $this->currencyRepository->findAll();
        usort($currencies, function (Currency $a, Currency $b) {
            return -($a->getPrice() <=> $b->getPrice());
        });

        return array_slice($currencies, 0, $count);
    }
}