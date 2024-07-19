<?php
namespace meteo\services;

class Theme {
    public static function set($theme) {
        $_SESSION["theme"] = $theme;
    }

    public static function get() {
        if ($_SESSION["theme"] !==  null) {
            return $_SESSION["theme"];
        }
        if (intval(date('H')) >= 21 && intval(date('H')) <= 6) {
            return 'dark';
        }
        return 'light';
    }

    public static function urlForChangeTheme($data, $link) {
        if(self::get() === 'light') {
            $data['theme'] = 'dark';
        }
        else {
            $data['theme'] = 'light';
        }
        $arg = http_build_query($data);
        return $link.'?'.$arg; 
    }
}
