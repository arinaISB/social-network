<?php

namespace App\Services;

use App\DTO\GeoCodingData;
use App\DTO\WeatherDTO;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class WeatherGeoService
{
    protected string $apiKey = 'eb8b3f28b6ee398fdd56e0f734771b22';
    protected string $baseUrl = 'https://api.openweathermap.org';

    public function getWeatherDataByCityName(string $cityName)
    {
        $coordinates = $this->getCoordinates($cityName);

        $weatherUrl = "{$this->baseUrl}/data/2.5/weather";

        $response = Http::get($weatherUrl, [
            'lat' => $coordinates->getLat(),
            'lon' => $coordinates->getLon(),
            'units' => 'metric',
            'appid' => $this->apiKey,
        ]);

        try {
            $data = $response->json();

            return WeatherDTO::create($data['name'], $data['main']['temp'], $data['weather'][0]['main'], $data['wind']['speed'],);
        } catch (\Throwable $exception) {
            Log::error("Error occurred while fetching weather for the city: {$cityName}", [
                'exception' => $exception->getMessage(),
                'city' => $cityName,
            ]);
            return null;
        }
    }

    public function getCoordinates(string $cityName): ?GeoCodingData
    {
        $geoUrl = "{$this->baseUrl}/geo/1.0/direct";

        $response = Http::get($geoUrl, [
            'q' => $cityName,
            'limit' => 1,
            'appid' => $this->apiKey,
        ]);

        try {
            $data = $response->json();

            if (!empty($data)) {
                return GeoCodingData::create($data[0]['lat'], $data[0]['lon']);
            }
        } catch (\Throwable) {
            Log::error("Failed to retrieve coordinates for city: {$cityName}");
            return null;
        }
    }
}
