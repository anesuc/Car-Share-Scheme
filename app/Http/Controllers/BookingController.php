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
    	$start_time = strtotime($start_time);
    	$end_time = strtotime($end_time);
    	$cars = Car::where('type','=', $type)->get();
    	$available_cars = array();

		foreach($cars as $car){
			echo $car->id;
			if ($this->car_available($type,$start_loc,$end_loc,$start_time,$end_time,$car->id)){array_push($available_cars,$car->id); 
				//echo 'your code works! dope shit';
			}

		}
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

	    	if ($booking->start_time >= $start_time_max)echo 'test';
	    	if ($booking->end_time <= $end_time_min && $booking->end_time <= $start_time) {
	    		$end_time_min = $booking->end_time;
	    		$end = $booking->end_loc;
	    	}
			if ($booking->start_time >= $start_time_max && $booking->start_time >= $end_time) {
				$start_time_max = $booking->start_time;
				$start = $booking->start_loc;
			}
	
			if ($start_time <= $booking->start_time && $booking->start_time < $end_time) {return false;}
			if ($start_time < $booking->end_time && $booking->end_time <= $end_time) {return false;}
	    }
	    echo 'start-';
	    echo $start;
		if ($end != $start_loc) {echo 'here3)';return false;}
		if ($start == 999) {return true;}
		if ($start != $end_loc) {echo 'here4)';return false;}
		return true;
    }

	/**
	 * @param user_id bigint (id of user)
	 * @param start_loc bigint (id of carpark)
	 * @param end_loc bigint (id of carpark)
	 * @param start_time datetime
	 * @param end_time datetime
	 * @param car_id bigint (id of car)
	 */
	public static function add_booking($start_loc, $end_loc, $start_time, $end_time, $car_id) {
		return DB::insert("insert into Booking (Car_ID, Start_Time, End_Time, Start_Carpark_ID, End_Carpark_ID) values (?, ?, ?, ?, ?, ?)", 
										[$car_id, $start_time, $end_time, $start_loc, $end_loc]);
	}
}
