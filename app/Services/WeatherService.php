<?php

namespace App\Services;

use App\DTO\WeatherData;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class WeatherService
{
    public static function extractWeatherData(string $lat, string $lon, string $appId)
    {
        Log::info('2');

        $url = "https://api.openweathermap.org/data/2.5/weather?lat={$lat}&lon={$lon}&units=metric&appid={$appId}";

        try {
            $response = Http::timeout(5)->get($url);
            $data = $response->json();


            return WeatherData::create(
                $data['name'] . ", " . $data['sys']['country'],
                $data['main']['temp'] . ' °C',
                $data['weather'][0]['main'] . ' (' . $data['weather'][0]['description'] . ')',
                $data['wind']['speed'] . ' m/s'
            );
        } catch (\Throwable) {
            return null;
        }
    }
}
