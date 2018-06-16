<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Car;
use DateTime;

class CarController extends Controller
{
    public function index(Request $request) {

        if($user = Auth::user()->admin == 1)
        {
            if ($request->has('car_type')) {
                add_car($request);
            } else {
                return view('add_cars');
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


        if(!$car->save()){
            return redirect('add_cars')->with('failed', 'Failed to add Car Park!');
        }
        else {
            $return_message = 'Successfully Added "'.$request["car_title"].'" to available cars';
            return redirect('add_cars')->with('success', $return_message);
        }

        //var_dump($allRequest['address']);
        //return redirect('add_parking')->with('success', var_dump(" ",$allRequest));
    }


}
