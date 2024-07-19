<?php
namespace meteo\services;

class View{
    protected static $blade = null;
    
    public static function initialize(){
        require_once (__DIR__.'/../lib/BladeOne.php');
        $views = __DIR__ . '/../view';
        $cache = __DIR__ . '/../cache';
        self::$blade = new \eftec\bladeone\BladeOne($views,$cache);
    }
    public static function render($name, $params = []){ 
        if(self::$blade === null) {
            self::initialize();
        }
        return self::$blade->run($name, $params);
    }
}