<?php

namespace optica\Http\Controllers;

use Illuminate\Http\Request;

class GeneralSettingsController extends Controller
{
    public function index()
    {
      return view('generalsettings.changepass');
    }
}
