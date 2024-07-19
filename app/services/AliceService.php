<?php  
  
namespace meteo\services;

use meteo\repository\Meteo;  
use meteo\services\LocalizationService;  
use meteo\services\WeatherService;
  
  
class AliceService  
{  
    public static function getWeatherResponse(string $day = null): array  
    {  
        $weatherData = WeatherService::getWeatherData($day);  
        $localizedStrings = LocalizationService::getLocalizedStrings();  
  
        $text = self::formatWeatherResponse($weatherData, $day, $localizedStrings);  
  
        return [  
            'response' => [  
                'text' => $text,  
                'tts' => $text,  
                'end_session' => true
            ],  
            'version' => '1.0'  
        ];  
    }  
  
    private static function formatWeatherResponse(?array $weatherData, ?string $day, array $localizedStrings): string  
    {  
        if (empty($weatherData)) {  
            return $localizedStrings['WEATHER_NOT_FOUND_STRING'];  
        }  
  
        $temperatureString = sprintf('%s°', $weatherData['temperature']);  
        $pressureString = sprintf('%s', $weatherData['pressure']);  
        $humidityString = sprintf('%s', $weatherData['humidity']);  
  
        $dayString = WeatherService::parseDay($day);  
  
        $responseString = $localizedStrings['HELLO_WEATHER_STRING'];  
        return sprintf($responseString, $dayString, $temperatureString, $pressureString, $humidityString);  
    }  
  
    public static function extractDay(string $text): ?string  
    {  
        if (strpos($text, 'позавчера') !== false) {  
            return 'позавчера';  
        } elseif (strpos($text, 'вчера') !== false) {  
            return 'вчера';  
        }  
  
        return null;  
    }  
}
