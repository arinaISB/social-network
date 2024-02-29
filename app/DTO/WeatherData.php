<?php

namespace App\DTO;

use Illuminate\Support\Facades\Log;

class WeatherData
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

    private function __construct(string $location, string $temperature, string $description, string $wind)
    {
        $this->location = $location;
        $this->temperature = $temperature;
        $this->description = $description;
        $this->wind = $wind;
    }

    public static function create(string $location, string $temperature, string $description, string $wind): WeatherData
    {
        Log::info('3');

        return new self($location, $temperature, $description, $wind);
    }
}
