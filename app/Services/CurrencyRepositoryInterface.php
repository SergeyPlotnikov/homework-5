<?php

namespace App\Services;

interface CurrencyRepositoryInterface
{

    /**
     * @param Currency[]
     */
    public function __construct(array $currencies);

    /**
     * @return Currency[]
     */
    public function findAll(): array;
}