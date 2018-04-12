<?php

namespace optica\Http\Controllers;

use Illuminate\Http\Request;
use optica\Client;
use optica\Ticket;
use optica\Photography;
use optica\History;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth; //component of autentication data

class TicketsController extends Controller
{
    public function index(){
      $client= Client::get();
      return view('tickets.manually')->with('clients',$client);
    }
    public function store(Request $request){
      if (isset($request->img)) {
      $ticket=Ticket::find($request->tic);
      $photo= new Photography;
      $base=$request->img;
      $base_php=explode(',',$base);
      $data= base64_decode($base_php[1]);
      $nombre=Carbon::now()->toDateString().$ticket->nro_tic.'.jpg';
      \Storage::disk('local')->put($nombre, $data);

      $photo->url_pho='storage'.'/'.$nombre;
      $photo->des_pho='Fotografia';
      $photo->save();
      //dd($photo->id);
      $ticket->id_pho= $photo->id;
      $ticket->save();
      $mensaje=' Boleta registrada correctamente!';
      return redirect()->route('client.index')->with('mensaje',$mensaje);
      }
      else {
        $mensaje=' Por favor tome una foto!';
        return redirect()->route('client.index')->with('mensaje2',$mensaje);
      }

    }
    public function fast(Request $request)
    {
      if (isset($request->img)) {

      $ph= new Photography;
      $ph->des_pho='Fotografia';
      $ph->url_pho='storage';
      $ph->save();
      $photo= Photography::find($ph->id);
      $base=$request->img;
      $base_php=explode(',',$base);
      $data= base64_decode($base_php[1]);
      $nombre=Carbon::now()->toDateString().$ph->id.'.jpg';
      \Storage::disk('local')->put($nombre, $data);

      $photo->url_pho='storage'.'/'.$nombre;
      $photo->des_pho='Fotografia';
      $photo->save();
      $client = new Client;
      $client->nam_cli= $request->nam_cli;
      $client->lpa_cli= $request->lpa_cli;
      $client->lma_cli= $request->lma_cli;
      $client->ci_cli= '';
      $client->add_cli= '';
      $client->pho_cli= '0';
      $client->old_cli= '';
      $client->id_user= Auth::user()->id;
      $client->save();
      //First save History
      $hist= new History;
      $hist->ini_hist= Carbon::now();
      $hist->id_cli=$client->id;
      $hist->id_user=Auth::user()->id;
      $hist->save();
      //dd($photo->id);
      $tic= new Ticket;
      $tic->cri_tic= '0';
      $tic->arm_tic= '0';
      $tic->med_tic= '0';
      $tic->mat_tic= '0';
      $tic->sal_tic= '0';
      $tic->tot_tic='0';
      $tic->nro_tic= '0';
      $tic->fec_tic= Carbon::now()->toDateString();
      $tic->hor_tic= '0';
      $tic->id_cli= $client->id;
      $tic->imp_tic= 1;
      $tic->id_pho= $photo->id;
      $tic->id_hist= $hist->id;
      $tic->id_user= Auth::user()->id;
      $tic->save();
      $mensaje=' Boleta registrada correctamente!';
      return redirect()->route('ticket.index')->with('mensaje',$mensaje);
      }
      else {
        $mensaje=' Por favor tome una foto!';
        return redirect()->route('ticket.index')->with('mensaje2',$mensaje);
      }

    }
}
