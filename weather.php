<?php

echo "Running weather.php...\n";

require_once __DIR__ . '/vendor/autoload.php';


use App\WeatherService;

$weatherService = new WeatherService();

$city = $argv['1'];
echo "Fetching weather for $city...\n  " ;
$weather = $weatherService->getWeather($city);

echo "\n";
echo "City : " . $weather['city'] . " \n";
echo "Temperature : " . $weather['temperature'] . "C\n";
echo "Decription : ". $weather['decription'] . " \n" ;
echo "Humidity : " . $weather['humidity'] . "%\n";

