<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|{end_time}{start_location}{end_location}{type}
,$end_time,$start_location,$end_location,$type
*/
Use App\Booking;
Use App\CarPark;
 
 Route::get('available_bookings/type={type}&start_loc={start_loc}&end_loc={end_loc}&start_time={start_time}&end_time={end_time}', 'BookingController@find_available');

 Route::get('add_booking/start_loc={start_loc}&end_loc={end_loc}&start_time={start_time}&end_time={end_time}&car_id={car_id}', 'BookingController@add_booking');


 Route::get('carparks/', 'CarParkController@find_all');
 Route::get('carpark_at/&lat={lat}&lng={lng}', 'CarParkController@find_exact');
 Route::get('carparks_within/&lat={lat}&lng={lng}&radius={radius}', 'CarParkController@find_within');
 Route::get('carparks_within/&lat={lat}&lng={lng}&lat2={lat2}&lng2={lng2}', 'CarParkController@find_within');





Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');
