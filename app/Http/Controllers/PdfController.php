<?php

namespace optica\Http\Controllers;

use Illuminate\Http\Request;
use optica\Ticket;
use optica\Client;
use optica\History;
use Illuminate\Support\Facades\Auth; //component of autentication data
use Carbon\Carbon;
use PDF; // at the top of the file
use TCPDF; // at the top of the file
use optica\User;
use optica\Profile;
use optica\Sold;
use optica\Canceled;
use optica\Expense;
use optica\Debt;
use optica\Discount;
use optica\Arrays;


class PdfController extends Controller
{
    public function pdf(Request $request){
      $com=Ticket::get();
      if(count($com)!=0):
        $ticket= Ticket::orderBy('id','DESC')->first();
        $h= History::orderBy('id','DESC')->first();
        $cli= Client::orderBy('id','DESC')->first();
        if ($ticket->imp_tic==1):
          $tic=new Ticket;
            if(count(Client::where('nam_cli','=',$request->nam_cli)->where('lpa_cli','=',$request->lpa_cli)->where('pho_cli','=',$request->pho_cli)->get())==0):
              $client= new Client;
            else:
              $cli=Client::where('nam_cli','=',$request->nam_cli)->where('lpa_cli','=',$request->lpa_cli)->where('pho_cli','=',$request->pho_cli)->first();
              $client= Client::find($cli->id);
            endif;
          $hist= new History;
        else:
          $tic= Ticket::find($ticket->id);
          $client= Client::find($cli->id);
          $hist= History::find($h->id);
        endif;
      else:
        $tic=new Ticket;
          if(count(Client::where('nam_cli','=',$request->nam_cli)->where('lpa_cli','=',$request->lpa_cli)->where('pho_cli','=',$request->pho_cli)->get())==0):
            $client= new Client;
          else:
            $cli=Client::where('nam_cli','=',$request->nam_cli)->where('lpa_cli','=',$request->lpa_cli)->where('pho_cli','=',$request->pho_cli)->first();
            $client= Client::find($cli->id);
          endif;
        $hist= new History;
      endif;
      $client->nam_cli= $request->nam_cli;
      $client->lpa_cli= $request->lpa_cli;
      $client->lma_cli= $request->lma_cli;
      $client->ci_cli= $request->ci_cli.' '.$request->xp_cli;
      $client->add_cli= $request->add_cli;
      $client->pho_cli= $request->pho_cli;
      $client->old_cli= $request->old_cli;
      $client->id_user= Auth::user()->id;
      $client->save();
      //First save History
      $hist->ini_hist= Carbon::now();
      $hist->id_cli=$client->id;
      $hist->id_user=Auth::user()->id;
      $hist->save();

      $tic->cri_tic= $request->cri_tic;
      $tic->arm_tic= $request->arm_tic;
      $tic->med_tic= $request->med_tic;
      $tic->mat_tic= '';
      $tic->acu_tic=$request->acu_tic;
      $tic->sal_tic= $request->sal_tic;
      $tic->tot_tic= $request->acu_tic+$request->sal_tic;
      $tic->nro_tic= $request->nro_tic;
      $tic->fec_tic= $request->fec_tic;
      $tic->hor_tic= $request->hor_tic;
      $tic->id_cli= $client->id;
      $tic->imp_tic= 0;
      $tic->id_pho= 0;
      $tic->id_hist= $hist->id;
      $tic->id_user= Auth::user()->id;
      $tic->save();
      return view('pdf.reporte')->with('tic',$tic)->with('cli',$client);
    }
    public function end()
    {
      $ticket=Ticket::orderBy('id','DESC')->first();
      if($ticket->imp_tic==0):
      $ticket->imp_tic=1;
      $ticket->save();
      $mensaje=" Boleta registrada correctamente!";
    	 return redirect()->route('client.index')->with('mensaje',$mensaje);
       else:
         $mensaje2=" PRIMERO DEBE IMPRIMIR LA BOLETA / ¡Ningun dato introducido en la base de datos!";
       	 return redirect()->route('client.index')->with('mensaje2',$mensaje2);
       endif;
    }
    public function employees($id){
      $emp=User::find($id);
      $profile= Profile::where('id_user','=',$emp->id)->first();
      if ($profile->lvl_pro==0) {
        $cargo='Administrador';
      }else{
        $cargo='Atendedor';
      }
      $pagelayout = array('216', '140');
      $pdf = new TCPDF('P','mm',$pagelayout, true, 'UTF-8', false);
      $pdf->SetTitle('BOLETA DE PAGOS - OPTICA RAMIREZ');
      $pdf->setPrintHeader(false);
      $pdf->setPrintFooter(false);
      $pdf->SetAutoPageBreak(TRUE, 10);
      $pdf->SetMargins(15, 15, 10);
      $pdf->AddPage();
      $pdf->Image('imagen/optica_ramirez.png', 95, 5, 40, 25, 'PNG', '', '', true, 250, '', false, false, false, false, false, false);

      //DATOS
      $pdf->SetFont('','B','8');
      $pdf->SetXY(8, 8);
      $pdf->Write(0,'Direccion:','','',false);
      $pdf->SetFont('','','8');
      $pdf->SetXY(27, 8);
      $pdf->Write(0,'AV. BUENOS AIRES N°919','','',false);
      $pdf->SetFont('','','8');
      $pdf->SetXY(27, 12);
      $pdf->Write(0,'(LADO PUENTE AVAROA)','','',false);
      $pdf->SetFont('','B','8');
      $pdf->SetXY(8, 17);
      $pdf->Write(0,'Telefono(s):','','',false);
      $pdf->SetFont('','','8');
      $pdf->SetXY(27, 17);
      $pdf->Write(0,'73740856 - 72555435','','',false);
      $pdf->Line ( 5, 25,95,25 ,array('width' => 0.3,'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)));

      //CABECERA
      $pdf->SetFont('','B','11');
      $pdf->SetXY(52, 30);
      $pdf->Write(0,'BOLETA DE PAGO','','',false);
      $pdf->SetFont('','B','10');
      $pdf->SetXY(8, 45);
      $pdf->Write(0,'Nombre completo:','','',false);
      $pdf->SetFont('','','10');
      $pdf->SetXY(41, 45);
      $pdf->Write(0,$emp->nam_user.' '.$emp->lpa_user.' '.$emp->lma_user,'','',false);
      $pdf->SetFont('','B','10');
      $pdf->SetXY(8, 40);
      $pdf->Write(0,'Nro de cedula de identidad:','','',false);
      $pdf->SetFont('','','10');
      $pdf->SetXY(56, 40);
      $pdf->Write(0,$emp->ci_user,'','',false);
      $pdf->SetFont('','B','10');
      $pdf->SetXY(8, 50);
      $pdf->Write(0,'Cargo:','','',false);
      $pdf->SetFont('','','10');
      $pdf->SetXY(21, 50);
      $pdf->Write(0,$cargo,'','',false);

      //DETALLE
      $pdf->SetFont('','B','10');
      $pdf->SetXY(60, 60);
      $pdf->Write(0,'DETALLE','','',false);


      //Firmas
      $pdf->SetFont('','B','9');
      $pdf->SetXY(15, 200);
      $pdf->Write(0,'ENTREGUE CONFORME','','',false);
      $pdf->Line ( 8, 198,60,198 ,array('width' => 0.3,'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)));
      $pdf->SetFont('','B','9');
      $pdf->SetXY(70, 200);
      $pdf->Write(0,'RECIBI CONFORME','','',false);
      $pdf->Line ( 68, 198,105,198 ,array('width' => 0.3,'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)));
      $pdf->SetXY(8, 70);
      $pdf->SetFont('','','9');

      $dis=Discount::where('id_emp','=',$emp->id)->whereRaw('MONTH(discount.created_at) = MONTH(CURRENT_DATE())')->whereRaw('YEAR(discount.created_at) = YEAR(CURRENT_DATE())')->get();
      $html='
      <style>
      .head{
        background-color: #fb8213;
      }
      .footer{
        background-color: #fb4413;
      }
      .foot{
        background-color: #13fb7e;
      }
      .danger{
        background-color: #e34444;
      }
      </style>
      <table border="1" cellpadding="4" >
       <thead>
         <tr class="head">
            <td width="70%"><b>CONCEPTO</b></td>
            <td width="30%"><b>MONTO</b></td>
         </tr>
       </thead>
       <tbody>
         <tr>
          <td width="70%">SUELDO TOTAL</td>
          <td width="30%"> Bs. 1800</td>
         </tr>';
         $total=1800;
         foreach ($dis as $d) {
           $html= $html.'
              <tr>
               <td width="70%">'.strtoupper ($d->tip_dis).' ('.$d->created_at->format('d-m-Y').')  '.$d->des_dis.'</td>
               <td width="30%" align="right" class="danger"> Bs. '.$d->mon_dis.'</td>
              </tr>';
              $total= $total-$d->mon_dis;
         }
         $html=$html.'
       </tbody>
       <tfoot>
        <tr>
          <td class="footer"><b>TOTAL</b>
          </td>
          <td class="foot"><b>
          Bs. '.$total.'
          </b></td>
        </tr>
       </tfoot>
      </table>
      ';

      $pdf->writeHTML($html, true, false, true, false, '');

      $pdf->write2DBarcode ( 'Usuario :'.$emp->nam_user.' '.$emp->lpa_user.' '.$emp->lma_user.' | Elaborado por: '.Auth::user()->nam_user.' '.Auth::user()->lpa_user.' '.Auth::user()->lma_user.' | Fecha:'.Carbon::now(), 'QRCODE,M', 110, 186, 20, 20, '','','');

      $pdf->Output('Boleta de pago.pdf');
    }
    public function diary(){
      $emp=User::find(Auth::user()->id);
      $tickets= Ticket::join('client','client.id','=','ticket.id_cli')->where('sal_tic','!=',0)->select('ticket.id','sal_tic','nam_cli','lpa_cli','lma_cli','fec_tic')->get();
      $tics=Ticket::whereRaw('tot_tic-sal_tic != 0')->whereRaw('DATE(created_at)=CURRENT_DATE')->get();
      $solds=Sold::whereRaw('DATE(created_at)=CURRENT_DATE')->get();
      $cancels= Canceled::whereRaw('DATE(created_at)=CURRENT_DATE')->get();
      $gastos= Expense::whereRaw('DATE(created_at)=CURRENT_DATE')->get();
      $discs= Discount::where('tip_dis','=','Adelantos')->whereRaw('DATE(created_at)=CURRENT_DATE')->get();
      $debts= Debt::whereRaw('DATE(created_at)=CURRENT_DATE')->get();
      $profile= Profile::where('id_user','=',$emp->id)->first();
      if ($profile->lvl_pro==0) {
        $cargo='Administrador';
      }else{
        $cargo='Atendedor';
      }
      $pagelayout = array('216', '140');
      $pdf = new TCPDF('P','mm','LETTER', true, 'UTF-8', false);
      $pdf->SetTitle('BOLETA DE PAGOS - OPTICA RAMIREZ');
      $pdf->setPrintHeader(false);
      $pdf->setPrintFooter(false);
      $pdf->SetAutoPageBreak(TRUE, 10);
      $pdf->SetMargins(15, 15, 10);
      $pdf->AddPage();
      $pdf->Image('imagen/optica_ramirez.png', 170, 5, 40, 25, 'PNG', '', '', true, 250, '', false, false, false, false, false, false);

      //DATOS
      $pdf->SetFont('','B','8');
      $pdf->SetXY(8, 8);
      $pdf->Write(0,'Direccion:','','',false);
      $pdf->SetFont('','','8');
      $pdf->SetXY(27, 8);
      $pdf->Write(0,'AV. BUENOS AIRES N°919','','',false);
      $pdf->SetFont('','','8');
      $pdf->SetXY(27, 12);
      $pdf->Write(0,'(LADO PUENTE AVAROA)','','',false);
      $pdf->SetFont('','B','8');
      $pdf->SetXY(8, 17);
      $pdf->Write(0,'Telefono(s):','','',false);
      $pdf->SetFont('','','8');
      $pdf->SetXY(27, 17);
      $pdf->Write(0,'73740856 - 72555435','','',false);
      $pdf->Line ( 5, 25,170,25 ,array('width' => 0.3,'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)));

      //CABECERA
      $pdf->SetFont('','B','11');
      $pdf->SetXY(92, 30);
      $pdf->Write(0,'LIBRO DIARIO','','',false);
      $pdf->SetFont('','B','11');
      $pdf->SetXY(88, 37);
      $pdf->Write(0,'FECHA:','','',false);
      $pdf->SetFont('','','11');
      $pdf->SetXY(103, 37);
      $pdf->Write(0,Carbon::now()->format('d-m-Y'),'','',false);

      $pdf->SetXY(8, 45);
      $pdf->SetFont('','','10');
      $html='
      <center><h3>ENTRADAS</h3></center>
      <table class="table table-hover">
        <thead>
          <tr>
            <th><b>Concepto</b></th>
            <th><b>Monto</b></th>
          </tr>
        </thead>
        <tbody>';
        $totalent=0;
        foreach ($tics as $tic):
        $html=$html.'
            <tr>
              <td class="info">Boletas - A cuenta</td>
              <td>Bs.'.$tic->acu_tic.'</td>
            </tr>';
            $totalent+=$tic->acu_tic;
        endforeach;
        foreach ($solds as $sold):
        $html=$html.'
            <tr>
              <td class="primary">Ventas menores</td>
              <td>Bs.'.$sold->tot_pro.'</td>
            </tr>';
        $totalent+=$sold->tot_pro;
      endforeach;
      foreach ($cancels as $cancel):
        $html=$html.'
            <tr>
              <td class="success">Boletas - Saldos</td>
              <td>Bs.'.$cancel->mon_can.'</td>
            </tr>';
        $totalent+=$cancel->mon_can;
      endforeach;
        $html=$html.'
        </tbody>
      </table>

      <center><h3>SALIDAS</h3></center>
      <table class="table table-hover">
        <thead>
          <tr>
            <th><b>Concepto</b></th>
            <th><b>Monto</b></th>
          </tr>
        </thead>
        <tbody>';
        $totalsal=0;
        foreach ($gastos as $gasto):
        $html=$html.'
            <tr>
              <td class="info">Gastos diarios</td>
              <td>Bs.'.$gasto->mon_exp.'</td>
            </tr>';
            $totalsal+=$gasto->mon_exp;
        endforeach;
        foreach ($discs as $disc):
        $html=$html.'
            <tr>
              <td class="primary">Adelantos</td>
              <td>Bs.'.$disc->mon_dis.'</td>
            </tr>';
        $totalsal+=$disc->mon_dis;
      endforeach;
      foreach ($debts as $debt):
        $html=$html.'
            <tr>
              <td class="success">Boletas - Saldos</td>
              <td>Bs.'.$debt->mon_deb.'</td>
            </tr>';
        $totalsal+=$debt->mon_deb;
      endforeach;
        $html=$html.'
        </tbody>
      </table>
      <h3>RESUMEN</h3>
      <table class="table table-hover">
          <tr>
            <td class="success"><b>ENTRADAS</b></td>
            <td>Bs. '.$totalent.'</td>
          </tr>
          <tr>
            <td class="danger"><b>SALIDAS</b></td>
            <td>Bs. '.$totalsal.'</td>
          </tr>
          <tr>
            <td class="warning"><b>TOTAL</b></td>
            <td>Bs. ';
            $total=$totalent-$totalsal;
          $html=$html.$total.'</td>
          </tr>

      </table>';
      $pdf->writeHTML($html, true, false, true, false, '');


      //Firmas
      $pdf->Line ( 8, 265,205,265 ,array('width' => 0.3,'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)));
      $pdf->SetFont('','B','7');
      $pdf->SetXY(8, 266);
      $pdf->Write(0,' Elaborado por: '.Auth::user()->nam_user.' '.Auth::user()->lpa_user.' '.Auth::user()->lma_user.' | Fecha:'.Carbon::now(),'','',false);
      $pdf->write2DBarcode ( 'Usuario :'.$emp->nam_user.' '.$emp->lpa_user.' '.$emp->lma_user.' | Elaborado por: '.Auth::user()->nam_user.' '.Auth::user()->lpa_user.' '.Auth::user()->lma_user.' | Fecha:'.Carbon::now(), 'QRCODE,M', 180, 230, 30, 30, '','','');

      $pdf->Output('Boleta de pago.pdf');

    }
    public function ticket_array($id){
      $arr=Arrays::find($id);
      $pagelayout = array('216', '140');
      $pdf = new TCPDF('P','mm',$pagelayout, true, 'UTF-8', false);
      $pdf->SetTitle('BOLETA DE ARREGLO - OPTICA RAMIREZ');
      $pdf->setPrintHeader(false);
      $pdf->setPrintFooter(false);
      $pdf->SetAutoPageBreak(TRUE, 10);
      $pdf->SetMargins(15, 15, 10);
      $pdf->AddPage();
      $pdf->Image('imagen/optica_ramirez.png', 95, 5, 40, 25, 'PNG', '', '', true, 250, '', false, false, false, false, false, false);
      $pdf->Image('imagen/optica_ramirez.png', 95, 108, 40, 25, 'PNG', '', '', true, 250, '', false, false, false, false, false, false);

      //DATOS
      $pdf->SetFont('','B','8');
      $pdf->SetXY(8, 8);
      $pdf->Write(0,'Direccion:','','',false);
      $pdf->SetFont('','','8');
      $pdf->SetXY(27, 8);
      $pdf->Write(0,'AV. BUENOS AIRES N°919','','',false);
      $pdf->SetFont('','','8');
      $pdf->SetXY(27, 12);
      $pdf->Write(0,'(LADO PUENTE AVAROA)','','',false);
      $pdf->SetFont('','B','8');
      $pdf->SetXY(8, 17);
      $pdf->Write(0,'Telefono(s):','','',false);
      $pdf->SetFont('','','8');
      $pdf->SetXY(27, 17);
      $pdf->Write(0,'73740856 - 72555435','','',false);
      $pdf->Line ( 5, 25,95,25 ,array('width' => 0.3,'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)));

      //CABECERA
      $pdf->SetFont('','B','11');
      $pdf->SetXY(48, 30);
      $pdf->Write(0,'BOLETA DE ARREGLO','','',false);
      $pdf->SetFont('','B','10');
      $pdf->SetXY(8, 45);
      $pdf->Write(0,'Nombre completo:','','',false);
      $pdf->SetFont('','','10');
      $pdf->SetXY(41, 45);
      $pdf->Write(0,$arr->nam_cli,'','',false);
      $pdf->SetFont('','B','10');
      $pdf->SetXY(90, 45);
      $pdf->Write(0,'Hora:','','',false);
      $pdf->SetFont('','','10');
      $pdf->SetXY(100, 45);
      $pdf->Write(0,Carbon::parse($arr->dat_ent)->format('H:i'),'','',false);
      $pdf->SetFont('','B','10');
      $pdf->SetXY(8, 40);
      $pdf->Write(0,'Nro de boleta:','','',false);
      $pdf->SetFont('','','10');
      $pdf->SetXY(36, 40);
      $pdf->Write(0,$arr->num_bol,'','',false);
      $pdf->SetFont('','B','10');
      $pdf->SetXY(60, 40);
      $pdf->Write(0,'Fecha de entrega:','','',false);
      $pdf->SetFont('','','10');
      $pdf->SetXY(92, 40);
      $pdf->Write(0,Carbon::parse($arr->dat_ent)->format('d-m-Y'),'','',false);
      $pdf->SetFont('','B','10');
      $pdf->SetXY(8, 50);
      $pdf->Write(0,'Montura:','','',false);
      $pdf->SetFont('','','10');
      $pdf->SetXY(24, 50);
      $pdf->Write(0,$arr->mon_arr,'','',false);
      $pdf->SetFont('','B','10');
      $pdf->SetXY(52, 50);
      $pdf->Write(0,'Material:','','',false);
      $pdf->SetFont('','','10');
      $pdf->SetXY(68, 50);
      $pdf->Write(0,$arr->mat_arr,'','',false);
      $pdf->SetFont('','B','10');
      $pdf->SetXY(92, 50);
      $pdf->Write(0,'Saldo:','','',false);
      $pdf->SetFont('','','10');
      $pdf->SetXY(103, 50);
      $pdf->Write(0,$arr->sal_arr,'','',false);
      $pdf->SetFont('','B','10');
      $pdf->SetXY(8, 55);
      $pdf->Write(0,'Descripcion:','','',false);
      $pdf->SetFont('','','10');
      $pdf->SetXY(30, 55);
      $pdf->Write(0,$arr->des_array,'','',false);
      //DATOS
      $pdf->SetFont('','B','8');
      $pdf->SetXY(8, 111);
      $pdf->Write(0,'Direccion:','','',false);
      $pdf->SetFont('','','8');
      $pdf->SetXY(27, 111);
      $pdf->Write(0,'AV. BUENOS AIRES N°919','','',false);
      $pdf->SetFont('','','8');
      $pdf->SetXY(27, 115);
      $pdf->Write(0,'(LADO PUENTE AVAROA)','','',false);
      $pdf->SetFont('','B','8');
      $pdf->SetXY(8, 120);
      $pdf->Write(0,'Telefono(s):','','',false);
      $pdf->SetFont('','','8');
      $pdf->SetXY(27, 120);
      $pdf->Write(0,'73740856 - 72555435','','',false);
      $pdf->Line ( 5, 128,95,128 ,array('width' => 0.3,'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)));

      //CABECERA
      $pdf->SetFont('','B','11');
      $pdf->SetXY(48, 135);
      $pdf->Write(0,'BOLETA DE ARREGLO','','',false);
      $pdf->SetFont('','B','10');
      $pdf->SetXY(8, 150);
      $pdf->Write(0,'Nombre completo:','','',false);
      $pdf->SetFont('','','10');
      $pdf->SetXY(41, 150);
      $pdf->Write(0,$arr->nam_cli,'','',false);
      $pdf->SetFont('','B','10');
      $pdf->SetXY(90, 150);
      $pdf->Write(0,'Hora:','','',false);
      $pdf->SetFont('','','10');
      $pdf->SetXY(100, 150);
      $pdf->Write(0,Carbon::parse($arr->dat_ent)->format('H:i'),'','',false);
      $pdf->SetFont('','B','10');
      $pdf->SetXY(8, 145);
      $pdf->Write(0,'Nro de boleta:','','',false);
      $pdf->SetFont('','','10');
      $pdf->SetXY(36, 145);
      $pdf->Write(0,$arr->num_bol,'','',false);
      $pdf->SetFont('','B','10');
      $pdf->SetXY(60, 145);
      $pdf->Write(0,'Fecha de entrega:','','',false);
      $pdf->SetFont('','','10');
      $pdf->SetXY(92, 145);
      $pdf->Write(0,Carbon::parse($arr->dat_ent)->format('d-m-Y'),'','',false);
      $pdf->SetFont('','B','10');
      $pdf->SetXY(8, 155);
      $pdf->Write(0,'Montura:','','',false);
      $pdf->SetFont('','','10');
      $pdf->SetXY(24, 155);
      $pdf->Write(0,$arr->mon_arr,'','',false);
      $pdf->SetFont('','B','10');
      $pdf->SetXY(52, 155);
      $pdf->Write(0,'Material:','','',false);
      $pdf->SetFont('','','10');
      $pdf->SetXY(68, 155);
      $pdf->Write(0,$arr->mat_arr,'','',false);
      $pdf->SetFont('','B','10');
      $pdf->SetXY(92, 155);
      $pdf->Write(0,'Saldo:','','',false);
      $pdf->SetFont('','','10');
      $pdf->SetXY(103, 155);
      $pdf->Write(0,$arr->sal_arr,'','',false);
      $pdf->SetFont('','B','10');
      $pdf->SetXY(8, 160);
      $pdf->Write(0,'Descripcion:','','',false);
      $pdf->SetFont('','','10');
      $pdf->SetXY(30, 160);
      $pdf->Write(0,$arr->des_array,'','',false);



      //Firmas
      $pdf->SetFont('','B','9');
      $pdf->SetXY(15, 100);
      $pdf->Write(0,'ENTREGUE CONFORME','','',false);
      $pdf->Line ( 8, 98,60,98 ,array('width' => 0.3,'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)));
      $pdf->SetFont('','B','9');
      $pdf->SetXY(70, 100);
      $pdf->Write(0,'RECIBI CONFORME','','',false);
      $pdf->Line ( 68, 98,105,98 ,array('width' => 0.3,'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)));
      $pdf->write2DBarcode ( 'Cliente :'.$arr->nam_cli.' | Elaborado por: '.Auth::user()->nam_user.' '.Auth::user()->lpa_user.' '.Auth::user()->lma_user.' | Fecha:'.Carbon::now(), 'QRCODE,M', 110, 86, 20, 20, '','','');

      $pdf->SetFont('','B','9');
      $pdf->SetXY(15, 200);
      $pdf->Write(0,'ENTREGUE CONFORME','','',false);
      $pdf->Line ( 8, 198,60,198 ,array('width' => 0.3,'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)));
      $pdf->SetFont('','B','9');
      $pdf->SetXY(70, 200);
      $pdf->Write(0,'RECIBI CONFORME','','',false);
      $pdf->Line ( 68, 198,105,198 ,array('width' => 0.3,'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)));
      $pdf->SetXY(8, 70);
      $pdf->SetFont('','','9');



      $pdf->write2DBarcode ( 'Cliente :'.$arr->nam_cli.' | Elaborado por: '.Auth::user()->nam_user.' '.Auth::user()->lpa_user.' '.Auth::user()->lma_user.' | Fecha:'.Carbon::now(), 'QRCODE,M', 110, 186, 20, 20, '','','');

      $pdf->Output('Boleta de pago.pdf');
    }
}
