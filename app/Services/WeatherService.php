<?php

namespace App\Services;

use App\Models\City;
use Illuminate\Support\Facades\Http;

class WeatherService
{
    public function getWeatherInformation(City $city)
    {
        $url = str_replace(
            [
                '{lat}',
                '{lng}',
                '{apikey}',
            ],
            [
                $city->latitude,
                $city->longitude,
                config('WEATHER_API_KEY')
            ],
            config('WEATHER_API_URL')
        );

        $response = Http::get($url);

        if ($response->successful()) {
            return $response->json();
        } else {
            return null;
        }

    }
}
