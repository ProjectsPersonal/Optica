<?php

namespace optica\Http\Controllers;

use Illuminate\Http\Request;
use optica\Client;
use optica\Sale;
use optica\Sold;
use optica\Product;
use Response;

class SoldController extends Controller
{
    public function index(){
      return view ('solds.solds');
    }
    public function report(){
      return view('solds.report');
    }
    public function graphics(){
      return view('solds.graphics');
    }
    public function inventory(){
      $product= Product::get();
      return view('solds.inventory')->with('product', $product);
    }
    public function smaller(){
      $sale= Sale::join('users','sale.id_user','=','users.id')->get();
      return view('solds.smaller')->with('sale', $sale);
    }
    public function getProducts(){
      $products= Sold::where('id_sale','=',$_POST['id'])->get();
      dd($_POST['id']);
      return Response::json( array(
      		'datos' => $products,
      		));
    }
}
