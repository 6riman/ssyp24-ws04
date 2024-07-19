<?php
error_reporting(E_ALL);

ini_set('display_errors', 'Off');
ini_set('log_errors', 'On');
ini_set('error_log', __DIR__ . '/app.log');

session_start();
spl_autoload_register('autoload');
function autoload($className)
{
    if (str_starts_with($className, "meteo")) {
        $file = "$className" . ".php";
        $file = str_replace("\\", "/", $file);
        $file = substr($file, 5);
        require_once(__DIR__ . $file);
    }
}  
date_default_timezone_set('Etc/GMT-7');
require_once(__DIR__ . "/config.php");
