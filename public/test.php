<?php


ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);



$format = "Y-m-d H:i:s";

$startTime = date($format);
$endTime = date($format);
$startLoc = 3;
$endLoc = 1;
$id = 2;

header("Location: https://cars.dev/add_booking/start_loc=$startLoc&end_loc=$endLoc&start_time=$startTime&end_time=$endTime&car_id=$id");

?>
