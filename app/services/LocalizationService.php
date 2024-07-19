<?php

namespace meteo\services;

ini_set('display_errors', 1); 
ini_set('display_startup_errors', 1); 
error_reporting(E_ALL); 

class LocalizationService
{
    private static $localizedStrings = [
        'HELLO_WEATHER_STRING' => "Привет!\nДанные о погоде %s:\n• Температура: %s\n• Давление: %s мм рт. ст.\n• Влажность: %s%%",
        'WEATHER_NOT_FOUND_STRING' => "Не могу найти данные о погоде"
    ];

    public static function getLocalizedStrings(): array
    {
        return self::$localizedStrings;
    }
}
