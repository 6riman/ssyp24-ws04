<?php
namespace meteo\controller;

use meteo\services\View;
use meteo\services\Theme;
use meteo\repository\Meteo;
use meteo\services\Helpers;
use meteo\services\Statistics;

class ErrorController{
    
    public static function get($request){
        echo View::render( 'error', []);

    }

}