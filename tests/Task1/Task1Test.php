<?php

namespace Tests\Task1;

use App\Services\Currency;
use App\Services\CurrencyRepositoryInterface;
use App\Services\GetCurrenciesCommandHandler;
use App\Services\GetMostChangedCurrencyCommandHandler;
use App\Services\GetPopularCurrenciesCommandHandler;
use Tests\TestCase;

class Task1Test extends TestCase
{
    public function test_currency_entity()
    {
        $currency = new Currency(
            1,
            'crypto',
            5000.0,
            'url',
            1.5
        );

        $this->assertEquals(1, $currency->getId());
        $this->assertEquals('crypto', $currency->getName());
        $this->assertEquals(5000.0, $currency->getPrice());
        $this->assertEquals('url', $currency->getImageUrl());
        $this->assertEquals(1.5, $currency->getDailyChangePercent());
    }

    public function test_currency_repository()
    {
        $repository = $this->app->make(CurrencyRepositoryInterface::class);

        $currencies = $repository->findAll();

        $this->assertNotEmpty($currencies);
        $this->assertCurrenciesData($currencies);

    }

    private function assertCurrenciesData(array $currencies): void
    {
        foreach ($currencies as $currency) {
            $this->assertInstanceOf(Currency::class, $currency);
            $this->assertNotEmpty($currency->getId());
            $this->assertNotEmpty($currency->getImageUrl());
            $this->assertNotEmpty($currency->getName());
            $this->assertNotEmpty($currency->getPrice());
            $this->assertNotEmpty($currency->getDailyChangePercent());
        }
    }

    public function test_find_all_currency_command()
    {
        $repository = $this->createRepositoryMock();

        $command = new GetCurrenciesCommandHandler($repository);

        $data = $command->handle();

        $this->assertNotEmpty($data);
        $this->assertCurrenciesData($data);
    }

    public function test_find_popular_currency_command()
    {
        $repository = $this->createRepositoryMock();

        $command = new GetPopularCurrenciesCommandHandler($repository);

        $data = $command->handle();

        $this->assertCount(3, $data);

        $popular = self::getPopularCurrencies();

        foreach ($data as $ind => $currency) {
            $this->assertEquals($popular[$ind]->getId(), $currency->getId());
            $this->assertEquals($popular[$ind]->getImageUrl(), $currency->getImageUrl());
            $this->assertEquals($popular[$ind]->getName(), $currency->getName());
            $this->assertEquals($popular[$ind]->getPrice(), $currency->getPrice());
            $this->assertEquals($popular[$ind]->getDailyChangePercent(), $currency->getDailyChangePercent());
        }
    }

    public function test_get_most_changed_currency_command()
    {
        $repository = $this->createRepositoryMock();

        $command = new GetMostChangedCurrencyCommandHandler($repository);

        $currency = $command->handle();

        $this->assertEquals(5, $currency->getId());
        $this->assertEquals('Mixin', $currency->getName());
        $this->assertEquals(475.19, $currency->getPrice());
        $this->assertEquals('url5', $currency->getImageUrl());
        $this->assertEquals(13.73, $currency->getDailyChangePercent());
    }

    private function createRepositoryMock(): CurrencyRepositoryInterface
    {
        return new InMemoryCurrencyRepository(self::getCurrencies());
    }

    private static function getCurrencies(): array
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

    private static function getPopularCurrencies(): array
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
                5,
                'Mixin',
                475.19,
                'url5',
                13.73
            ),
            new Currency(
                2,
                'Ethereum',
                436.59,
                'url2',
                10.11
            ),
        ];
    }
}