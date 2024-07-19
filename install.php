<?php

require_once(__DIR__."/app/bootstrap.php");
use meteo\services\DB;

$query = "CREATE TABLE IF NOT EXISTS weather_state(
id int(6) AUTO_INCREMENT PRIMARY KEY,
create_time DATETIME,
temperature float,
pressure float,
humidity float)";

DB::write($query);
echo "Install ok";
