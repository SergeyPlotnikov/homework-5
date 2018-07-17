<?php

namespace App\Services;

class GetCurrenciesCommandHandler
{
    private $currencyRepository;

    public function __construct(CurrencyRepositoryInterface $currencyRepository)
    {
        $this->currencyRepository = $currencyRepository;
    }

    public function handle(): array
    {
        return $this->currencyRepository->findAll();
    }
}