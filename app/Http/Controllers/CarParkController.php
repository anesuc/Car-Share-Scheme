<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Carpark;
use App\Booking;
use App\Car;
use DateTime;
class CarParkController extends Controller
{

    public function index(Request $request) {

        if($user = Auth::user()->admin == 1)
        {
            if ($request->has('address')) {
                add_parking($request);
            } else {
                return view('add_parking');
            }

        }
        return view('welcome');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function add_parking(Request $request) {


    }

    public function store(Request $request) {
        $allRequest = $request->request->all();

        $this->validate($request, [
            'address' => 'required',
            'long' => 'required',
            'lat' => 'required',
            'capacity' => 'required',
        ]);

        $carpark = new Carpark;
        $carpark->physical_location = $request["address"];
        $carpark->long = floatval($allRequest['long']);
        $carpark->lat = floatval($allRequest['lat']);
        $carpark->capacity = (int)$allRequest['capacity'];


        if(!$carpark->save()){
            return redirect('add_parking')->with('failed', 'Failed to add Car Park!');
        }
        else {
            $return_message = 'Successfully Added "'.$request["address"].'" as a Car Park!';
            return redirect('add_parking')->with('success', $return_message);
        }

        //var_dump($allRequest['address']);
        //return redirect('add_parking')->with('success', var_dump(" ",$allRequest));
    }


	public function find_within($lat, $lng, $lat2, $lng2) {
		$result = Carpark::whereRaw('latitude > ? and longitude > ? and latitude < ? and longitude < ?', [$lat, $lng, $lat2, $lng2])->get();

		echo var_dump($result);
		return $result;
	}

	//radius is in km
	public function find_within_radius($lat, $lng, $radius) {
		$radius /= 111;//convert km to lat/lng (degrees around earth)
		$radiusSqr = $radius * $radius;
		$result = Carpark::whereRaw('SQUARE(latitude - ?) + SQUARE(longitude - ?) < ?', [$lat, $lng, $radiusSqr])->get();

		echo var_dump($result);
		return $result;
	}

	public function find_exact($lat, $lng) {
		$result = Carpark::whereRaw('latitude = ? and longitude = ?', [$lat, $lng])->get();

		echo var_dump($result);
		return $result;
	}

	public function find_all() {
		$all = Carpark::all();
		$json = json_encode($all);
		echo $json;
	}


}
