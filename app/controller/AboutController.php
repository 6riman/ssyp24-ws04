<?php
namespace meteo\controller;
use meteo\services\View;
use meteo\services\Theme;

class AboutController 
{
    public static function get($request) 
    {
        if(isset($request['theme'])) {
            Theme::set($request['theme']);
        }
        $data['theme'] = Theme::get();
        $link = explode("?", $_SERVER['REQUEST_URI']);
        $data['url'] = Theme::urlForChangeTheme($request, $link[0]);
        echo View::render('about', $data);
    }
}