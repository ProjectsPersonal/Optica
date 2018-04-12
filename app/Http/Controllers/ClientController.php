<?php

namespace optica\Http\Controllers;

use Illuminate\Http\Request;
use optica\Client;
use optica\Ticket;
use Illuminate\Support\Facades\Auth; //component of autentication data
use DB;

class ClientController extends Controller
{

   public function index()
   {
     $tickets= Ticket::join('client','client.id','=','ticket.id_cli')->where('id_pho','==',0)->select('cri_tic','arm_tic','med_tic','mat_tic','sal_tic','tot_tic','nro_tic','fec_tic','hor_tic','imp_tic','ticket.id','nam_cli','lpa_cli', 'lma_cli','old_cli','ci_cli','add_cli','pho_cli')->get();
   	  return view('clients.client')->with('tickets',$tickets);

   }
   public function store(Request $request){
     //Controller of store user Created by: Developer Luis Quisbert
     $client= new Client;
     $client->nam_cli= $request->nam_cli;
     $client->lpa_cli= $request->lpa_cli;
     $client->lma_cli= $request->lma_cli;
     $client->ci_cli= $request->ci_cli.' '.$request->xp_cli;
     $client->add_cli= $request->add_cli;
     $client->pho_cli= $request->pho_cli;
     $client->old_cli= $request->old_cli;
     $client->id_user= Auth::user()->id;
     $client->save();
     $mensaje=" Cliente registrado exitosamente!";
   	 return redirect()->route('client.index')->with('mensaje',$mensaje);
   }
   public function history(){
     $client= Client::get();
     return view('clients.history')->with('clients',$client);
   }
}
