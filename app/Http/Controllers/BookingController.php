<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Booking;
use App\Car;
use DateTime;
class BookingController extends Controller
{
    
	public function index()
	{
        return view('book');
    }
    public function payment()
	{
        return view('payment');
    }

    public function find_available($type,$start_loc,$end_loc,$start_time,$end_time)
    {
    	$start_time_t = new DateTime($start_time);
    	$end_time_t = new DateTime($end_time);
    	$cars = Car::where('type','=', $type)->get();
    	$available_cars = array();

		foreach($cars as $car){
			if ($this->car_available($start_loc,$end_loc,$start_time_t,$end_time_t,$car->id)){
				array_push($available_cars,$car); 
				
			}

		}
		$json = json_encode($available_cars);
		echo $json;
    }



    public static function car_available($start_loc,$end_loc,$start_time,$end_time,$car_id)
    {
        $end = 999;
	    $start = 999;
	    $end_time_min = new DateTime('4000-01-01 00:00:00');
	    $start_time_max = new DateTime('2000-01-01 00:00:00');



	    $bookings = Booking::where('car_id','=', $car_id)->get();

	   
	    if (count($bookings)==1 &&$bookings[0]->end_loc == $start_loc) return true;
	   	//if (count($bookings)==0) return true;
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


	public static function add_booking($start_loc, $end_loc, $start_time, $end_time, $car_id, $access_token) {
		
		
		$users = User::where('access_token','=', $access_token)->get();
		if(count($users)==1){
			foreach($users as $user){
				$receipt = rand ( 1000000000 , 2000000000 );
				if(BookingController::car_available($start_loc, $end_loc, $start_time, $end_time, $car_id)){
					$booking = new Booking;
			        $booking->car_id = $car_id;
			        $booking->start_loc = $start_loc;
			        $booking->end_loc = $end_loc;
			        $booking->start_time = $start_time;
			        $booking->end_time = $end_time;
			        $booking->receipt = $receipt;
			        $booking->user_id =  $user->id;


			        if(!$booking->save()){
					    echo "couldn't add booking";
					}
					else {
						echo $receipt;
					}
				}
				else echo "car not available";			
			}
		}
		else echo "not logged in"; 
	}

	public function test() {
		
		$user_id =  Auth::user();
		echo json_encode($user_id);
		if($user = Auth::user()){
			echo "done";
		}
	}
}
