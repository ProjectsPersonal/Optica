<?php

namespace optica\Http\Controllers;

use Illuminate\Http\Request;
use optica\Event;
use Illuminate\Support\Facades\Auth; //component of autentication data

class CalendarController extends Controller
{
    public function store(Request $request){
      $event= new Event;
      $event->title= $request->title;
      $event->start= $request->fec_ini.' '.$request->hor_ini;
      $event->end= $request->fec_end.' '.$request->hor_end;
      $event->body= $request->body;
      $event->url= '#';
      $event->class= 'Importante';
      $event->color= $request->color;
      $event->id_user= Auth::user()->id;
      $event->save();
      return redirect()->route('admin.calendar');
    }

}
