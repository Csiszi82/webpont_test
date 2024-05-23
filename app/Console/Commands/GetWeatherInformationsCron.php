<?php

namespace App\Console\Commands;

use App\Models\City;
use App\Models\CityWeather;
use Illuminate\Console\Command;

class GetWeatherInformationsCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:get-weather-informations-cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get Weather information for all cities';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $cities = City::all();

        foreach ($cities as $city) {
            $weatherInformationService = app('weatherService');
            $weatherInformation        = $weatherInformationService->getWeatherInformation($city);

            if ($weatherInformation) {
                $cityWeather                  = new CityWeather();
                $cityWeather->city_id         = $city->id;
                $cityWeather->temperature     = $weatherInformation['main']['temp'];
                $cityWeather->pressure        = $weatherInformation['main']['pressure'];
                $cityWeather->humidity        = $weatherInformation['main']['humidity'];
                $cityWeather->min_temperature = $weatherInformation['main']['temp_min'];
                $cityWeather->max_temperature = $weatherInformation['main']['temp_max'];
                $cityWeather->created_at      = date('Y-m-d H:i:s');
                $cityWeather->updated_at      = date('Y-m-d H:i:s');

                $cityWeather->save();
            }
        }

        return 0;

    }
}
