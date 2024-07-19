<?php
namespace meteo\controller;

use meteo\services\View;
use meteo\services\Theme;
use meteo\repository\Meteo;
use meteo\services\Helpers;
use meteo\services\Statistics;

class IndexController{
    public static function get($request){
        $params = [
            'date' => $request['date']??null,
            'data_type_chart' => $request['data_type_chart']??'temperature', 
            'time_chart' => $request['time_chart']??'1',
            'send_date' => $request['date']??date('Y-m-d')  
        ]; 
        $data = array_merge($params, Statistics::getStatistics($params));
        $data['table'] = Statistics::getChart($params);

        if(isset($request['theme'])) {
            Theme::set($request['theme']);
        }
        $data['theme'] = Theme::get();
        $link = explode("?", $_SERVER['REQUEST_URI']);
        $data['url'] = Theme::urlForChangeTheme($request, $link[0]);
        echo View::render('page', $data);

    }

    public static function post($request = []) {
        if($request['hash'] === md5(DEVICES_PASSWORD.file_get_contents(__DIR__ . "/../cache/put_content.txt"))) {
            $minutes = strval(floor(intval(date('i'))/10)).'0';
            if(!Meteo::getByTime(date('Y-m-d H:').$minutes.':00')) {
                Meteo::add([
                'temperature' => $request['temperature'],
                'pressure' => $request['pressure'],
                'humidity' => $request['humidity']??null,
                'create_time' => date('Y-m-d H:').$minutes.':00'
            ]);
            }
        }
        $st = Helpers::generateString(); 
        echo $st;
        file_put_contents(__DIR__ . "/../cache/put_content.txt", $st);
    }
}