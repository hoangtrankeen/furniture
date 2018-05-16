<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerAuthController extends Controller
{

    public function __construct()
    {
        //people are not logged in as customer
        $this->middleware('guest:customer');
    }

    public function showLoginForm()
    {
        return view('frontend/login');
    }

    public function login(Request $request)
    {
        //Validate form

        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required|min:6'

        ]);

        //Attempt to log user in

        if(Auth::guard('customer')->attempt(['email'=>$request->email, 'password'=>$request->password], $request->remember)){
            //Success, redirect to intended location
            return redirect()->intended();
        }

        // else redirect to login form with the form data
        return redirect()->back()->input($request->only('email','remember'));
    }
}