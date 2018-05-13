<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Carpark;
use App\Booking;
use App\Car;
use DateTime;
class CarParkController extends Controller
{
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
