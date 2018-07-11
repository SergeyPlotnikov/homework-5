<?php

namespace App\Services;

class CurrencyPresenter
{
    public static function present(Currency $currency): array
    {
        $currencyPresentation = [];
        $currencyPresentation['id'] = $currency->getId();
        $currencyPresentation['name'] = $currency->getName();
        $currencyPresentation['img'] = $currency->getImageUrl();
        $currencyPresentation['price'] = $currency->getPrice();
        $currencyPresentation['daily_change'] = $currency->getDailyChangePercent();
        return $currencyPresentation;
    }
}