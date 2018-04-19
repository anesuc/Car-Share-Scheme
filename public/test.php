<?php

ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);

include("../app/Http/Controllers/BookingController.php");


$format = "Y-m-d H:i:s";

$start = date($format);
$end = date($format);

print(add_booking(2, 3, $start, $end, 2));

?>
