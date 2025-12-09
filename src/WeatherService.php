<?php

namespace App;

use GuzzleHttp\Client;

class WeatherService
{
    private Client $client;

    public function __construct(
        private string $apiUrl = 'https://api.openweathermap.org/data/2.5/weather'
    ) {
        $this->client = new Client();
        $this->apiKey ??= $_ENV['OPENWEATHER_API_KEY'];
    }

    public function getWeather(string $city): array
    {
        $response = $this->client->get($this->apiUrl, [
            'query' => [
                'q'     => $city,
                'appid' => $this->apiKey,
                'units' => 'metric'
            ]
        ]);

        $weatherData = json_decode($response->getBody()->getContents(), true);

        return [
            'city'        => $weatherData['name'],
            'temperature' => $weatherData['main']['temp'],
            'description' => $weatherData['weather'][0]['description'],
            'humidity'    => $weatherData['main']['humidity'],
        ];
    }
}
