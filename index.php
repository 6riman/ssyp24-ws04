<?php  

require_once(__DIR__."/app/bootstrap.php");

$routers = [

    '/' => [
        'GET' => '\meteo\controller\IndexController::get',
        'POST' => '\meteo\controller\IndexController::post',
    ],
    '/about/' => [
        'GET' => '\meteo\controller\AboutController::get',
    ],
    '/alice/' => [
        'POST' => '\meteo\controller\AliceController::post',
        'GET' => '\meteo\controller\AliceController::post',
    ],
    '/advice/' => [
        'POST' => '\meteo\controller\AdviceController::get',
        'GET' => '\meteo\controller\AdviceController::get',
    ],


];

$uri = explode('?',$_SERVER["REQUEST_URI"])[0];  
$method = $_SERVER['REQUEST_METHOD'];
$request =  $method === 'GET' ? $_GET : json_decode(file_get_contents('php://input'), true);
if($uri === ""){  
    $uri = "/";  
}  elseif (substr($uri, -1) !== "/"){   
    $uri .= "/";  
}  
if(isset($routers[$uri]) && $routers[$uri][$method]) {
    call_user_func($routers[$uri][$method], $request);
} else {
    header("HTTP/1.0 404 Not Found");
    \meteo\controller\ErrorController::get([]);
}
