<style type="text/css">
	@page {
   size: 21.5cm 31cm;
	 margin: 0px;
}
.principal{
	margin-top:27cm;
	margin-left: 3cm;
	width: 12cm;
}
</style>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body style="background-image:url('{{url('imagen/layout.jpg')}}');">
<div class="principal">
	<p style="margin-bottom:5px;">{{$cli->nam_cli.' '.$cli->lpa_cli.' '.$cli->lma_cli}}</p>
	<span style="margin-left: 5cm; margin-bottom:5px;">{{$tic->sal_tic}} <span style="margin-left: 3cm; margin-bottom:5px;">{{$tic->tot_tic}}</span></span>
	<p style="margin-bottom:5px; margin-top:5px;">{{$tic->cri_tic}}</p>
	<span style="margin-bottom:5px;">{{$tic->fec_tic}}<span style="margin-left: 7cm; margin-bottom:5px;">{{$tic->hor_tic}}</span></span>
</div>
</body>
</html>
 <?php
require_once(public_path().'/dompdf/dompdf_config.inc.php');
$dompdf= new DOMPDF();
$dompdf->load_html(ob_get_clean());
$dompdf->render();
$pdf= $dompdf->output();
$filename='Reporte.pdf';
//convierte la hoja actual en pdf
$dompdf->stream($filename, array("Attachment"=>0));
//descarga directamente el pdf



  ?>
