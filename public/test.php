<?php


ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);

print("test\n");
try {
	require App\Http\Controllers\BookingController as Cont;
} catch(Exception $E) {
	print($E->getMessage());
}


$format = "Y-m-d H:i:s";

$start = date($format);
$end = date($format);

print("test\n");
try {
	Cont::add_booking(2, 3, $start, $end, 2);
} catch(Exception $E) {
	print($E->getMessage());
}
print("success... ?");

?>
