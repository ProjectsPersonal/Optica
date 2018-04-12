<?php

namespace optica\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use optica\Profile;
use optica\Event;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $event=Event::whereDate('start', '=', Carbon::now()->format('Y-m-d'))->get();
        return view('home.dashboard')->with('event',$event);
    }
}
