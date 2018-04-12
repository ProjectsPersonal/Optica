<?php

namespace optica\Http\Controllers;

use Illuminate\Http\Request;
use optica\Client;
use optica\Arrays;
use Illuminate\Support\Facades\Auth; //component of autentication data

class ArrangementController extends Controller
{
    public function index(){
      $arrays=Arrays::get();
      return  view('solds.arrangements.arrangements')->with('arrays',$arrays);
    }
    public function store(Request $request){
      //Controller of store user Created by: Developer Luis Quisbert
      $array= new Arrays;

      $array->dat_rec= $request->dat_rec;
      $array->dat_ent= $request->dat_ent.' '. $request->dat_ent2;
      $array->des_array= $request->des_array;

      $array->id_user= Auth::user()->id;
      $array->nam_cli= $request->nam_cli;
      $array->mon_arr= $request->mon_arr;
      $array->mat_arr= $request->mat_arr;
      $array->cue_arr= $request->cue_arr;
      $array->sal_arr= $request->sal_arr;
      $array->save();

      $codigo= Arrays::find($array->id);
      if(strlen($codigo->id)==1){
        $code='000'.$codigo->id;
      }
      if(strlen($codigo->id)==2){
        $code='00'.$codigo->id;
      }
      if(strlen($codigo->id)==3){
        $code='0'.$codigo->id;
      }
      if(strlen($codigo->id)==4){
        $code=$codigo->id;
      }
      $codigo->num_bol='BOL-'.$code;
      $codigo->save();
      $mensaje=" Arreglo registrado exitosamente!";
      return redirect()->route('arrangement.index')->with('mensaje',$mensaje);
    }

}
