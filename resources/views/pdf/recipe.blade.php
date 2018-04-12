<style type="text/css">
	@page {
   size: 10.7cm 16.5cm;
	 margin: 0px;

}
.datos{
	margin-top:3cm;
	margin-left: 2.5cm;
}
.lejos{
	margin-top:1.5cm;
	margin-left: 2.5cm;
}
.cerca{
	margin-top:1.2cm;

}
</style>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body style="">
<div class="datos">
<span style="margin-bottom:5px;">{{$cli->nam_cli.' '.$cli->lpa_cli.' '.$cli->lma_cli}}<span style="margin-left:1cm;margin-bottom:5px;">{{$cli->old_cli}}</span></span><br>
<span style="margin-bottom:5px;">{{\Carbon\Carbon::today()->toDateString()}}<span style="margin-left:3.4cm;margin-bottom:5px;">{{$cli->pho_cli}}</span></span>
</div>
<div class="lejos">
<span>{{$recipe->lde_rec}}<span style="margin-left:1cm">{{$recipe->ldc_rec}}<span style="margin-left:1.5cm">{{$recipe->ldj_rec}}<span style="margin-left:1cm">{{$recipe->lda_rec}}</span></span></span></span><br><br>
<span style="margin-bottom:15px;">{{$recipe->lie_rec}}<span style="margin-left:1cm">{{$recipe->lic_rec}}<span style="margin-left:1.5cm">{{$recipe->lij_rec}}<span style="margin-left:1cm">{{$recipe->lia_rec}}</span></span></span></span><br>
<div style="padding-top:10px;">
	<span >{{$recipe->dip_rec}}<span style="margin-top:10px; margin-left:2.7cm">{{$recipe->add_rec}}</span></span><br><br>
</div>
<div class="cerca">
<span>{{$recipe->cde_rec}}<span style="margin-left:1cm">{{$recipe->cdc_rec}}<span style="margin-left:1.5cm">{{$recipe->cdj_rec}}<span style="margin-left:1cm">{{$recipe->cda_rec}}</span></span></span></span><br><br>
<span style="margin-bottom:15px;">{{$recipe->cie_rec}}<span style="margin-left:1cm">{{$recipe->cic_rec}}<span style="margin-left:1.5cm">{{$recipe->cij_rec}}<span style="margin-left:1cm">{{$recipe->cia_rec}}</span></span></span></span><br>
<div style="padding-top:10px;">
	<span ><span style="margin-top:10px; margin-left:1.7cm">{{$recipe->tip_rec}}</span></span><br>
	<span >{{$recipe->use_rec}}<span style="margin-top:0px; margin-left:4.7cm">{{$recipe->con_rec}}</span></span><br><br>
	<span ><span style="margin-top:0px; margin-left:1.7cm">{{$recipe->obs_rec}}</span></span><br><br>
</div>
</div>
</body>
</html>
 <?php
require_once(public_path().'/dompdf/dompdf_config.inc.php');
$dompdf= new DOMPDF();
$dompdf->load_html(ob_get_clean());
$dompdf->render();
$pdf= $dompdf->output();
$filename='Recipe.pdf';
//convierte la hoja actual en pdf
$dompdf->stream($filename, array("Attachment"=>0));
//descarga directamente el pdf



  ?>
