<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Booking;
use App\Car;
use DateTime;
use DB;
class BookingController extends Controller
{
    
	public function index(){
		if($user = Auth::user())
        {
            return view('book');
        }
        return redirect('login');
        
    }
    public function payment(){
        return view('payment');
    }
   	public function receipt() {
		return view('receipt');
	}

    public function find_available($type,$start_loc,$end_loc,$start_time,$end_time)
    {
    	$cars = Car::where('type','=', $type)->get();
    	$available_cars = array();

		foreach($cars as $car){
			if ($this->car_available($start_loc,$end_loc,$start_time,$end_time,$car->id)){
				array_push($available_cars,$car); 
				
			}

		}
		$json = json_encode($available_cars);
		echo $json;
    }



    public static function car_available($start_loc,$end_loc,$start_time_t,$end_time_t,$car_id)
    {
        $end = 999;
	    $start = 999;
	    $end_time_min = new DateTime('4000-01-01 00:00:00');
	    $start_time_max = new DateTime('2000-01-01 00:00:00');

	    $start_time = new DateTime($start_time_t);
    	$end_time = new DateTime($end_time_t);

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
				if(BookingController::car_available($start_loc, $end_loc, $start_time, $end_time, $car_id)){
					$booking = new Booking;
			        $booking->car_id = $car_id;
			        $booking->start_loc = $start_loc;
			        $booking->end_loc = $end_loc;
			        $booking->start_time = new DateTime($start_time);
			        $booking->end_time = new DateTime($end_time);
			        $booking->user_id =  $user->id;


			        if(!$booking->save()){
					    echo "couldn't add booking";
					}
					else {
						echo $booking->id;//actually receipt - confusing but too hard to change
					}
				}
				else echo "car not available";			
			}
		}
		else echo "not logged in"; 
	}



	public function get_single_receipt($id, $access_token) {

    	$bookings = DB::table('bookings')
            ->join('users', 'users.id', '=', 'bookings.user_id')
            ->join('cars', 'cars.id', '=', 'bookings.car_id')
            ->join('carparks as cp1', 'cp1.id', '=', 'bookings.start_loc')
            ->join('carparks as cp2', 'cp2.id', '=', 'bookings.end_loc')
            ->select('cp1.lat as start_lat','cp1.long as start_long','cp2.lat as end_lat','cp2.long as end_long','cp1.physical_location as start_loc','cp2.physical_location as end_loc','title','registration','name','start_time', 'end_time','receipt', 'access_token')
            ->get( );

            foreach($bookings as $booking){
            	if($booking->receipt==$id){
            		if($booking->access_token == $access_token)	{
	            		echo '{"booking" :';
	        			echo json_encode($booking);
	        			echo '}';
	        		}
        		}
        	}
	}


	public function get_user_bookings($access_token) {

    	$bookings = DB::table('bookings')
            ->join('users', 'users.id', '=', 'bookings.user_id')
            ->join('cars', 'cars.id', '=', 'bookings.car_id')
            ->join('carparks as cp1', 'cp1.id', '=', 'bookings.start_loc')
            ->select('start_time', 'cp1.physical_location as start_loc', 'receipt', 'title', 'registration', 'access_token')
            ->where('access_token', $access_token)
             ->orderBy('start_time', 'desc')
            ->get( );
            echo json_encode($bookings);
	}

	public function get_upcoming_bookings($access_token) {

    	$bookings = DB::table('bookings')
            ->join('users', 'users.id', '=', 'bookings.user_id')
            ->join('cars', 'cars.id', '=', 'bookings.car_id')
            ->join('carparks as cp1', 'cp1.id', '=', 'bookings.start_loc')
            ->select('start_time', 'cp1.physical_location as start_loc', 'receipt', 'title', 'registration', 'access_token')
            ->where('access_token', $access_token)
            ->whereDate('start_time','>=', DB::raw('CURDATE()'))
            ->orderBy('start_time', 'asc')
            ->get( );
            echo json_encode($bookings);
	}
	public function get_past_bookings($access_token) {

    	$bookings = DB::table('bookings')
            ->join('users', 'users.id', '=', 'bookings.user_id')
            ->join('cars', 'cars.id', '=', 'bookings.car_id')
            ->join('carparks as cp1', 'cp1.id', '=', 'bookings.start_loc')
            ->select('start_time', 'cp1.physical_location as start_loc', 'receipt', 'title','registration', 'access_token')
            ->where('access_token', $access_token)
            ->whereDate('start_time','<', DB::raw('CURDATE()'))
            ->orderBy('start_time', 'desc')
            ->get( );
            echo json_encode($bookings);
	}
}
