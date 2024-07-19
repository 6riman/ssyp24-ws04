<?php
namespace meteo\services;
use meteo\repository\Meteo;
class Statistics {
    public static function getStatistics($params){ 
        $date = $params['date']??date('Y-m-d');
        $data_meteo = Meteo::getLastByDay($date);
        $data_meteo['create_time'] = date_format(date_create($data_meteo['create_time']), 'H:i');
        $data_AVG_meteo = Meteo::getTemperatureStatisticByDay($date);
        return [
            "morning_data" => Meteo::getLastByTimeRange($date." 06.00.00", $date." 09.00.00")??0,
            "noon_data" => Meteo::getLastByTimeRange($date." 12.00.00", $date." 15.00.00")??0,
            "evening_data" => Meteo::getLastByTimeRange($date." 17.00.00", $date." 20.00.00")??0,
            "night_data" => Meteo::getLastByTimeRange($date." 22.00.00", $date." 23.50.00")??0,
            "no_statistic" => !boolval($data_AVG_meteo['avg_temperature']??0),
            "create_time" => $data_meteo['create_time']??0,
            "temperature" => number_format($data_meteo['temperature']??0, 1, ',', ' '), 
            "pressure" => number_format($data_meteo['pressure']??0, 0, ',', ' '),
            "humidity" => number_format($data_meteo['humidity']??0, 0, ',', ' '),
            "avg_temp" => number_format($data_AVG_meteo['avg_temperature']??0, 1, ',', ' '), 
            "min_temp" => number_format($data_AVG_meteo['min_temperature']??0, 1, ',', ' '), 
            "max_temp" => number_format($data_AVG_meteo['max_temperature']??0, 1, ',', ' '), 
        ];
    }
    public static function getChart($params){
        $time_chart_end = date('Y-m-d', strtotime('+1 day', strtotime($params['send_date']??date('Y-m-d'))));
        if($params['time_chart'] == 1){
            $time_chart_start = $params['send_date']??date('Y-m-d');
        }
        elseif($params['time_chart'] == 3){
            $time_chart_start = date('Y-m-d', strtotime('-2 days', strtotime($params['send_date']??date('Y-m-d'))));            
        }
        elseif($params['time_chart'] == 7){
            $time_chart_start = date('Y-m-d', strtotime('-6 days', strtotime($params['send_date']??date('Y-m-d'))));            
        }
        return Meteo::getMeteoByTime($time_chart_start, $time_chart_end);
    }
}