<?php
exec('sqlite3 -header -csv /data/database.db "select * from bmp180;" > /tmp/data.csv');

$filename = '/tmp/data.csv';

header("Pragma: no-cache");
header("Expires: 0");

header("Content-type: text/csv");
header("Content-Disposition: attachment; filename=AJCWeatherStationData.csv");

header('Content-Length: ' . filesize($filename));
readfile($filename);
?>
