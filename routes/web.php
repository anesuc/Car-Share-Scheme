<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();



Route::get('/logout', 'AdminController@logoutUser');


Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');
Route::get('booking', 'BookingController@index');
Route::get('/payment?start_loc={start_loc}&end_loc={end_loc}&start_time={start_time}&end_time={end_time}&car_id={car_id}&access_token={access_token}', 'BookingController@payment');
Route::get('/payment', 'BookingController@payment');
//Route::get('/available_bookings', 'BookingController@find_available');