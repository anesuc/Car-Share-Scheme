<?php

namespace App\Http\Controllers;

use App\CarService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Car;
use DateTime;

class CarServiceController extends Controller
{
    public function index(Request $request)
    {

        if ($user = Auth::user()->admin == 1) {
            if ($request->has('car_id')) {
                add_car_service($request);
            } else {
                $allCars = Car::all();
                return view('add_service')->with("allCars",$allCars);
            }

        }
        return view('welcome');
    }


    function add_car_service(Request $request)
    {

    }

    public function store(Request $request)
    {
        $allRequest = $request->request->all();

        $this->validate($request, [
            'car_id' => 'required',
            'date_of_service' => 'required',
            'invoice_no' => 'required',
        ]);

        $carservice = new CarService;
        $carservice->car_id = $request["car_id"];
        $carservice->date_of_service = new DateTime($allRequest['date_of_service']);
        $carservice->invoice_no = $allRequest['invoice_no'];



        if (!$carservice->save()) {
            return redirect('add_service')->with('failed', 'Failed to add Car Service!');
        } else {
            $cars = Car::where('id', $request["car_id"])->get();
            //var_dump($car);
            $car_title = "";
            foreach($cars as $car) {
                $car_title = $car->title;
            }

            $return_message = 'Successfully Added Service details for "'.$car_title.'""';
            return redirect('add_service')->with('success', $return_message);
        }
    }
}