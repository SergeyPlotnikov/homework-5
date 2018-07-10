<?php
/**
 * Created by PhpStorm.
 * User: Serhii
 * Date: 10.07.2018
 * Time: 23:02
 */

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