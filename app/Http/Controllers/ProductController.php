<?php

namespace optica\Http\Controllers;

use Illuminate\Http\Request;
use optica\Product;
use Illuminate\Support\Facades\Auth; //component of autentication data

class ProductController extends Controller
{
    public function store(Request $request){
        $product= new Product;
        $product->cod_pro= $request->cod_pro;
        $product->nam_pro= $request->nam_pro;
        $product->des_pro= $request->des_pro;
        $product->can_pro= $request->can_pro;
        $product->id_user= Auth::user()->id;
        $product->save();
        $mensaje='Producto registrado correctamente';
        return redirect()->route('sold.inventory')->with('mensaje',$mensaje);
    }
}
