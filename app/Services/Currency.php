<?php

namespace App\Services;

class Currency
{
    private $id;
    private $name;
    private $price;
    private $imageUrl;
    private $dailyChangePercent;

    public function __construct(int $id, string $name, float $price, string $imageUrl, float $dailyChangePercent)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->imageUrl = $imageUrl;
        $this->dailyChangePercent = $dailyChangePercent;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @return string
     */
    public function getImageUrl(): string
    {
        return $this->imageUrl;
    }

    /**
     * @return float
     */
    public function getDailyChangePercent(): float
    {
        return $this->dailyChangePercent;
    }


}