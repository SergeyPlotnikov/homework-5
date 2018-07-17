<?php

namespace App\Http\Controllers;

use App\Services\CurrencyPresenter;
use App\Services\CurrencyRepositoryInterface;
use App\Services\GetCurrenciesCommandHandler;
use App\Services\GetMostChangedCurrencyCommandHandler;
use App\Services\GetPopularCurrenciesCommandHandler;

class CurrenciesController extends Controller
{
    public function showCurrencies(CurrencyRepositoryInterface $repository)
    {
        $responseData = [];
        $getCurrenciesCommandHandler = new GetCurrenciesCommandHandler($repository);
        foreach ($getCurrenciesCommandHandler->handle() as $item) {
            array_push($responseData, CurrencyPresenter::present($item));
        }
        return response()->json($responseData);
    }

    public function showUnstableCurrency(CurrencyRepositoryInterface $repository)
    {
        $mostChangedCurrency = (new GetMostChangedCurrencyCommandHandler($repository))->handle();
        return response()->json(CurrencyPresenter::present($mostChangedCurrency));
    }

    public function showPopularCurrencies(CurrencyRepositoryInterface $repository)
    {
        $popularCurrencies = (new GetPopularCurrenciesCommandHandler($repository))->handle();
        return view('popular_currencies', ['popularCurrencies' => $popularCurrencies]);
    }
}