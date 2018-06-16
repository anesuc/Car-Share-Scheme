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

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/history', function () {

	if($user = Auth::user())
        {
            return view('history');
        }
    return view('welcome');
});

Route::get('/site_control', function () {

    if($user = Auth::user()->admin == 1)
    {
        return view('site_control');
    }
    return view('welcome');
});

Route::get('/add_cars', function () {

    if($user = Auth::user()->admin == 1)
    {
        return view('add_cars');
    }
    return view('welcome');
});

/*
Route::get('/add_parking', function () {

    if($user = Auth::user()->admin == 1)
    {
        return view('add_parking');
    }
    return view('welcome');
});*/

Route::get('/add_service', function () {

    if($user = Auth::user()->admin == 1)
    {
        return view('add_service');
    }
    return view('welcome');
});

Auth::routes();

Route::resource('add_parking', 'CarParkController');//for Adding Carparks



Route::get('/logout', 'AdminController@logoutUser');


//Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');//for home page
Route::get('/account', 'HomeController@account');//for account changing
Route::get('booking', 'BookingController@index');
Route::get('receipt', 'BookingController@receipt');
Route::get('receipt?number={receipt_number}&access_token={access_token}', 'BookingController@receipt');
Route::get('/payment', 'BookingController@payment');
Route::get('/payment?start_loc={start_loc}&end_loc={end_loc}&start_time={start_time}&end_time={end_time}&car_id={car_id}&access_token={access_token}', 'BookingController@payment');


//Route::get('/available_bookings', 'BookingController@find_available');