<?php

namespace optica\Http\Controllers;

use Illuminate\Http\Request;
use optica\Sale;
use optica\Sold;
use Illuminate\Support\Facades\Auth;
class SalesController extends Controller
{
  public function index()
  {
    $sales= Sale::get();
     return view('admin.admin')->with('sales',$sales);

  }
  public function store(Request $request){
    //Controller of store user Created by: Developer Luis Quisbert

    if ($request->num!=0) {
      $sale= new Sale;
      $sale->fec_sale= $request->fec_sale;
      $sale->nam_sale= $request->nam_sale;
      $sale->id_user= Auth::user()->id;
      $sale->save();


      for ($i=1; $i<=$request->input('num') ; $i++) {
        $sold=new Sold;
        $sold->des_pro=$request->input('pro'.$i);
        $sold->pre_sold=$request->input('pre'.$i);
        $sold->can_pro=$request->input('fil'.$i);
        $sold->tot_pro=$request->input('tot'.$i);
        $sold->id_user= Auth::user()->id;
        $sold->id_sale= $sale->id;
        $sold->save();


      }
      $mensaje=" Venta registrada exitosamente!";
      return redirect()->route('sold.smaller')->with('mensaje',$mensaje);
    }else{
      $mensaje2=" No hay productos en la lista!";
      return redirect()->route('sold.smaller')->with('mensaje2',$mensaje2);

    }
  }
}
