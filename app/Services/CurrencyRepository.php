<?php

namespace App\Services;


class CurrencyRepository implements CurrencyRepositoryInterface
{
    private $currencies;

    public function __construct(array $currencies)
    {
        $this->currencies = $currencies;
    }

    public function findAll(): array
    {
        return $this->currencies;
    }

}