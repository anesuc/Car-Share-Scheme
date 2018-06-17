<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use App\Car;
use App\Carpark;
use App\Booking;
use DateTime;

class CarController extends Controller
{
    public function index(Request $request) {

        if($user = Auth::user()->admin == 1)
        {
            if ($request->has('car_type')) {
                add_car($request);
            } else {
                $allCarparks = Carpark::all();
                return view('add_cars')->with("allCarparks",$allCarparks);
            }

        }
        return view('welcome');
    }



    public function store(Request $request) {
        $allRequest = $request->request->all();

        /*$this->validate($request, [
            'car_type' => 'required',
            'car_title' => 'required',
            'car_registration"' => 'required',
            'purchase_date' => 'required',
            'last_service' => 'required',
        ]);*/

        $car = new Car;
        $car->type = $request["car_type"];
        $car->title = $allRequest['car_title'];
        $car->registration = $allRequest['car_registration'];
        $car["Date of Purchase"] = new DateTime($allRequest['purchase_date']);
        $car["Last Service"] = new DateTime($allRequest['last_service']);
        $car->carpark_id = $allRequest['start_location'];

       


        if ($request->hasFile('car_image')) {
            $car->imageExtension = $request->file('car_image')->getClientOriginalExtension();;
        } else {
            $car->imageExtension = "";
        }


        if(!$car->save()){
            return redirect('add_cars')->with('failed', 'Failed to add Car Park!');
        }
        else {
            if ($request->hasFile('car_image')) {
                $imageName = $car->id.".".$request->file('car_image')->getClientOriginalExtension();
                $request->file('car_image')->move("images/cars",$imageName);
            }
            $return_message = 'Successfully Added "'.$request["car_title"].'" to available cars';

            $booking = new Booking;
            $booking->car_id = $car->id;
            $booking->start_loc = 0;
            $booking->end_loc = $allRequest['start_location'];
            $booking->start_time = new DateTime('1000-01-01 00:00:00');
            $booking->end_time = new DateTime('1000-01-01 00:00:00');
            $booking->user_id =  0;

            if(!$booking->save()){
                    return redirect('add_cars')->with('failed', $return_message);
            }


            return redirect('add_cars')->with('success', $return_message);
        }
        


        //rename ('image.png', 'images/cars/image.png');

        //var_dump($allRequest['address']);
        //return redirect('add_parking')->with('success', var_dump(" ",$allRequest));
    }


}
