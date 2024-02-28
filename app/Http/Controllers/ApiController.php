<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ApiController extends Controller
{
    public function getWeather()
    {
        $lat = '55.44';
        $lon= '37.30';
        $appId = 'eb8b3f28b6ee398fdd56e0f734771b22';
        $url = "https://api.openweathermap.org/data/2.5/weather?lat={$lat}&lon={$lon}&units=metric&appid={$appId}";

        try {
            $response = Http::timeout(5)->get($url);
//            dd($data = $response->json());
            $data = $response->json();
            return $this->formatWeatherData($data);

        } catch (\Throwable $exception) {
            return ('error');
        }
    }

    public function formatWeatherData($data)
    {
        return [
            'location' => $data['name'] . ", " . $data['sys']['country'],
            'temperature' => $data['main']['temp'] . ' °C',
            'weather' => $data['weather'][0]['main'] . ' (' . $data['weather'][0]['description'] . ')',
            'wind' => $data['wind']['speed'] . ' m/s',
        ];
    }

}
