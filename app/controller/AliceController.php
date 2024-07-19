<?php 

namespace meteo\controller; 

use meteo\services\AliceService; 


class AliceController 
{

    public static function post($request): void 
    {
        $text = $request['request']['original_utterance']; 

        $day = AliceService::extractDay($text); 

        $response = AliceService::getWeatherResponse($day); 

        header('Content-Type: application/json'); 

        echo json_encode($response); 
    } 
}

