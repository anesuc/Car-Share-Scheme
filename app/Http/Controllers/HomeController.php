<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        if($user = Auth::user())
        {
            $admin = Auth::user()->admin;
            if($admin==2){ 
                return redirect('site_control');
            }
        }
        return redirect('booking');
    }


}
