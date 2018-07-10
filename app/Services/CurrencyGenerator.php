<?php

namespace App\Services;

class CurrencyGenerator
{
    public static function generate(): array
    {
        return [
            new Currency(
                1,
                'Bitcoin',
                6383.94,
                'url1',
                5.95
            ),
            new Currency(
                2,
                'Ethereum',
                436.59,
                'url2',
                10.11
            ),
            new Currency(
                3,
                'Litecoin',
                75.60,
                'url3',
                8.22
            ),
            new Currency(
                4,
                'Dash',
                220.85,
                'url4',
                7.29
            ),
            new Currency(
                5,
                'Mixin',
                475.19,
                'url5',
                13.73
            ),
            new Currency(
                6,
                'Paypex',
                1.35,
                'url6',
                7.33
            ),
            new Currency(
                7,
                'Enigma',
                1.21,
                'url7',
                12.64
            ),
        ];
    }
}