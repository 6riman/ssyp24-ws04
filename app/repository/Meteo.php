<?php
namespace meteo\repository;
use meteo\services\DB;

class Meteo{

    public static function add($params = []){
        $query = "INSERT INTO weather_state SET create_time = :create_time, temperature = :temperature, pressure = :pressure, humidity = :humidity";
        DB::write($query, $params);
        var_export($params);
    }

    public static function getTemperatureStatisticByDay($start)  { 
        $query = "SELECT MIN(temperature) AS min_temperature, MAX(temperature) AS max_temperature, AVG(temperature) AS avg_temperature FROM weather_state 
        WHERE create_time >= :time_start AND create_time <= :time_end";
        return DB::read($query, [
            'time_end' => date('Y-m-d', strtotime('+1 day', strtotime($start))), 
            'time_start' => $start
        ])[0];
    } 

    public static function getMeteoByTime ($start, $end){ 
        $query = "SELECT create_time, temperature, pressure, humidity FROM weather_state WHERE create_time >= :time_start AND create_time <= :time_end ORDER BY id"; 
        return DB::read($query, [
            'time_end' => $end,  
            'time_start' => $start]);
    } 
       
    public static function getByTime($time){
        $query = "SELECT create_time, temperature, pressure, humidity FROM weather_state WHERE create_time = :create_time";
        return DB::read($query, ['create_time' => $time]);
    }

    public static function getLastByDay($time){
        $query = "SELECT create_time, temperature, pressure, humidity FROM weather_state WHERE create_time > :time_min AND create_time < :time_max ORDER BY id DESC";
        return DB::read($query, ['time_min' => $time, 'time_max' => $time.' 23'.':59'.':59'])[0];
    }
    public static function getLastByTimeRange($start, $end){
        $query = "SELECT create_time, temperature, pressure, humidity FROM weather_state WHERE create_time >= :time_min AND create_time <= :time_max ORDER BY id DESC";
        return DB::read($query, ['time_min' => $start, 'time_max' => $end])[0];
    }
}
