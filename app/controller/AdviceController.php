<?php
namespace meteo\controller;
use meteo\services\View;
use meteo\services\Theme;
use meteo\services\Advices;
class AdviceController{
    public static function get($request){
        $advice = Advices::getRandAdvice();
        $params = [
            'advice' => $advice
        ];
        if(isset($request['theme'])) {
            Theme::set($request['theme']);
        }
        $data['theme'] = Theme::get();
        $link = explode("?", $_SERVER['REQUEST_URI']);
        $data['url'] = Theme::urlForChangeTheme($request, $link[0]);
        $params = array_merge($params, $data);
        echo View::render('advice', $params);
    }
}