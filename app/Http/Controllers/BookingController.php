<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Booking;
use App\Car;
use DateTime;
class BookingController extends Controller
{
    public function find_available($type,$start_loc,$end_loc,$start_time,$end_time)
    {
    	$start_time_t = new DateTime($start_time);
    	$end_time_t = new DateTime($end_time);
    	$cars = Car::where('type','=', $type)->get();
    	$available_cars = array();

		foreach($cars as $car){
			if ($this->car_available($type,$start_loc,$end_loc,$start_time_t,$end_time_t,$car->id)){
				array_push($available_cars,$car); 
				
			}

		}
		$json = json_encode($available_cars);
		echo $json;
    }



    public static function car_available($type,$start_loc,$end_loc,$start_time,$end_time,$car_id)
    {
        $end = 999;
	    $start = 999;
	    $end_time_min = new DateTime('4000-01-01 00:00:00');
	    $start_time_max = new DateTime('2000-01-01 00:00:00');



	    $bookings = Booking::where('car_id','=', $car_id)->get();
	   	if (count($bookings)==0) return true;
	    foreach($bookings as $booking){
	    	$b_start = new DateTime($booking->start_time);
	    	$b_end = new DateTime($booking->end_time);
	    	if ($b_end <= $end_time_min && $b_end <= $start_time) {
	    		$end_time_min = $booking->end_time;
	    		$end = $booking->end_loc;
	    	}
			if ($b_start >= $start_time_max && $b_start >= $end_time) {
				$start_time_max = $booking->start_time;
				$start = $booking->start_loc;
			}
	
			if ($start_time <= $b_start && $b_start < $end_time) {return false;}
			if ($start_time < $b_end && $b_end <= $end_time) {return false;}
	    }
		if ($end != $start_loc) {return false;}
		if ($start == 999) {return true;}
		if ($start != $end_loc) {return false;}
		return true;
    }
}
