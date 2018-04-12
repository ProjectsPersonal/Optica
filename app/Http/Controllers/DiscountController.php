<?php

namespace optica\Http\Controllers;

use Illuminate\Http\Request;
use optica\Discount;
use Illuminate\Support\Facades\Auth; //component of autentication data


class DiscountController extends Controller
{
    public function store(Request $request){
        $discount= new Discount;
        $discount->tip_dis= $request->tipo;
        $discount->mon_dis= $request->monto;
        $discount->des_dis= $request->desc;
        $discount->id_emp= $request->id;
        $discount->id_user= Auth::user()->id;
        $discount->save();
        $mensaje= ' ¡Adelanto y/o descuento registrado correctamente!';
        return redirect()->route('admin.employees')->with('mensaje',$mensaje);
    }
}
