<?php

namespace meteo\services;

use meteo\repository\Meteo;

ini_set('display_errors', 1); 
ini_set('display_startup_errors', 1); 
error_reporting(E_ALL); 

class WeatherService
{
    public static function getWeatherData(string $day = null): array
    {
        $day = self::parseDay($day);
        $date = self::getDateFromDay($day);
        $weatherData = Meteo::getLastByDay($date);
        return self::validateData($weatherData);
    }

    private static function validateData(array $weatherData): array
    {
        if (empty($weatherData['temperature'])) {
            $weatherData['temperature'] = 0;
        }
        if (empty($weatherData['pressure'])) {
            $weatherData['pressure'] = 0;
        }
        if (empty($weatherData['humidity'])) {
            $weatherData['humidity'] = 0;
        }

        return $weatherData;
    }

    public static function parseDay(?string $day): string
    {
        switch ($day) {
            case 'позавчера':
                return 'позавчера';
            case 'вчера':
                return 'вчера';
            default:
                return 'сейчас';
        }
    }

    private static function getDateFromDay(string $day): string
    {
        if ($day === 'сейчас') {
            return date('Y-m-d');
        } elseif ($day === 'вчера') {
            return date('Y-m-d', strtotime('-1 day'));
        } elseif ($day === 'позавчера') {
            return date('Y-m-d', strtotime('-2 days'));
        } else {
            return $day;
        }
    }

    public static function declensionOfDegrees(int $degrees): string
    {
        $lastDigit = $degrees % 10;
        $lastTwoDigits = $degrees % 100;

        if ($lastDigit == 1 && $lastTwoDigits != 11) {
            return "градус";
        } elseif (($lastDigit >= 2 && $lastDigit <= 4) && ($lastTwoDigits < 12 || $lastTwoDigits > 14)) {
            return "градуса";
        } else {
            return "градусов";
        }
    }
}
