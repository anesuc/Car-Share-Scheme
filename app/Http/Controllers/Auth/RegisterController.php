<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */
 
    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
        'name' => 'required|max:255',
        'email' => 'required|email|max:255|unique:users',
        'street_number' => 'required|max:255',
        'route' => 'required|max:255',
        'locality' => 'required|max:255',
        'administrative_area_level_1' => 'required|max:255',
        'postal_code' => 'required|digits_between:1,4',
        'country' => 'required|max:255',
        'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
        'name' => ucwords($data['name']),
        'email' => $data['email'],
        'street_number' => $data['street_number'],
        'route' => $data['route'],
        'locality' => $data['locality'],
        'administrative_area_level_1' => $data['administrative_area_level_1'],
        'country' => $data['country'],
        'postal_code' => (int)$data['postal_code'],
        'password' => bcrypt($data['password']),
        'admin' => 0,
        'access_token' => str_random(100),
        ]);
    }
}
