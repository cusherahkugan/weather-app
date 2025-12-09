<?php

echo "Running weather.php...\n";

require_once __DIR__ . '/vendor/autoload.php';


use App\WeatherService;

$weatherService = new WeatherService();

$city = 'Vienna';
try {
    $weather = $weatherService->getWeather($city);
    var_dump($weather);
} catch (\Exception $e) {
    echo "Error fetching weather: " . $e->getMessage();
}
