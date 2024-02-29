<?php

namespace App\Services;

use App\DTO\GeoCodingData;
use Illuminate\Support\Facades\Http;

class GeoCodingService
{
    public static function getCoordinates(string $cityName, string $appId): ?GeoCodingData
    {
        $limit = 1;

        $url = "https://api.openweathermap.org/geo/1.0/direct?q={$cityName}&limit={$limit}&appid={$appId}";

        try {
            $response = Http::timeout(5)->get($url);
            $data = $response->json();

            return GeoCodingData::create($data[0]['lat'], $data[0]['lon']);
        } catch (\Throwable) {
            return null;
        }
    }
}
