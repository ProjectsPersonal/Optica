<?php

namespace optica\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; //component of autentication data
use Session;
class AccessController extends Controller
{
    public function logout()
    {
      if (isset(Auth::user()->nic_user))
      {
        $datos=Auth::user();
        Session::put('datos',$datos);
      }
        $datos= Session::get('datos');
        Auth::logout();
    	return view('home.lock', compact('datos'));
    }
}
