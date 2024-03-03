<?php

namespace App\DTO;

class WeatherDTO
{
    private string $location;
    private string $temperature;
    private string $description;
    private string $wind;

    public function getTemperature(): string
    {
        return $this->temperature;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getWind(): string
    {
        return $this->wind;
    }

    public function getLocation(): string
    {
        return $this->location;
    }

    private function __construct(string $location, float $temperature, string $description, float $wind)
    {
        $this->location = $location;
        $this->temperature = $temperature;
        $this->description = $description;
        $this->wind = $wind;
    }

    public static function create(string $location, float $temperature, string $description, float $wind): WeatherDTO
    {
        return new self($location, $temperature, $description, $wind);
    }
}
