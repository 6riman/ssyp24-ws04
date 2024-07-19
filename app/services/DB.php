<?php
namespace meteo\services;
class DB {
    protected static $pdo = null;

    public static function initialize() {
        $dsn = DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME."; port=".DB_PORT;
        self::$pdo = new \PDO($dsn, DB_USER, DB_PASSWORD);
    }
    public static function read($query, $params = []){
        if(self::$pdo === null){
            self::initialize();
        }
        $st = self::$pdo->prepare($query);
        $st->execute($params);
        $data = $st->fetchAll(\PDO::FETCH_ASSOC);
        return $data;
    }
    public static function write($query, $params = []){
        if(self::$pdo === null){
            self::initialize();
        }
        $st = self::$pdo->prepare($query);
        $st->execute($params);
    }
}
