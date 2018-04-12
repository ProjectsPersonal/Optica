@extends('layout')

@section('title')
	Clientes - Optica ramirez
@endsection
@section('css')
	{!! Html::style('css/client.css')!!}
	<style type="text/css">
	    .contenedor{ margin-left: 6%;float: left;}
	    .contenedor2{ margin-left: 6%;}
	    .titulo{ font-size: 12pt; font-weight: bold;}
	    #camara, #foto,#foto2{
	        width: 25vw;
	        min-height: 22vw;
	    }
	</style>
@endsection
@section('content')
<div class="container-fluid">
	<div class="col-md-6 well form">
		<fieldset>
			<legend>Fotografia pendiente</legend>
			<a href="{{ route('ticket.index') }}" class="btn btn-danger btn-raised" name="button"><i class="material-icons">fast_forward</i> Registro rapido</a>
			<br/>
			<br/>
			<div class="table-responsive">
			<table class="table table-striped table-hover" id="client">
  <thead>
    <tr>
      <th data-dynatable-column="nro_tic">Boleta nro</th>
      <th data-dynatable-column="sal_tic">Saldo</th>
      <th data-dynatable-column="tot_tic">Total</th>
      <th data-dynatable-column="nombre">Nombre</th>
      <th data-dynatable-column="pho_cli">Telefono</th>
      <th data-dynatable-column="button">Acciones</th>
    </tr>
  </thead>
  <tbody>

	</tr>
  </tbody>
</table>
</div>
		</fieldset>
	</div>
	<div class="col-md-5 well">

		<form action="{{route('pdf.end')}}" method="post" name="formid" id="formid">
			{{ csrf_field() }}
</form>
			<form action="{{route('pdf')}}" method="post" target='_blank'>
				{{ csrf_field() }}
		<label for="" class="label label-danger">Datos de lentes - Boleta</label>
		<div class="form-group has-danger">
			<label class="col-md-2 control-label">Nombres</label>
		<div class="col-md-10" >
			<input type="text" name="nam_cli" class="form-control" required>
		</div></div>
		<div class="form-group " style="padding-bottom:0px;">
			<label class="col-md-2 control-label">Paterno</label>
		<div class="col-md-4" >
			<input type="text" name="lpa_cli" class="form-control"  required>
		</div></div>
		<div class="form-group ">
			<label class="col-md-2 control-label">Materno</label>
		<div class="col-md-4" >
			<input type="text" name="lma_cli" class="form-control" required>
		</div></div>
		<div class="form-group" style="padding-bottom:0px;">
			<label class="col-md-2 control-label">Telefono</label>
		<div class="col-md-5" >
			<input type="number" name="pho_cli" min=6000000  class="form-control" required>
		</div></div>
		<div class="form-group">
			<label class="col-md-1 control-label">Edad</label>
		<div class="col-md-4" >
			<input type="number" step="1" min="1" name="old_cli" class="form-control" required>
		</div>
	</div>
	<div class="form-group">
		<label for="" class="col-lg-2 control-label">Cristales</label>
		<div class="col-lg-10">
			<input type="text" name="cri_tic" class="form-control" value="" required>
		</div>
	</div>
	<div class="form-group">
		<label for="" class="col-lg-2 control-label">Armazon</label>
		<div class="col-lg-10">
			<input type="text" name="arm_tic" class="form-control" value="" required>
		</div>
	</div>
	<div class="form-group">
		<label for="" class="col-lg-2 control-label">Medida</label>
		<div class="col-lg-10">
			<input type="text" name="med_tic" class="form-control" value="" required>
		</div>
	</div>

	<div class="form-group">
		<label for="" class="col-lg-2 control-label">A cuenta</label>
		<div class="col-lg-3">
			<input type="number" name="acu_tic" class="form-control" value="" required>
		</div>
	</div>
	<div class="form-group">
		<label for="" class="col-lg-1 control-label">Saldo</label>
		<div class="col-lg-4">
			<input type="number" name="sal_tic" class="form-control" value="" required>
		</div>
	</div>
	<div class="form-group">
		<label for="" class="col-lg-3 control-label">N° de boleta</label>
		<div class="col-lg-9">
			<input type="number" name="nro_tic" class="form-control" value="" required>
		</div>
	</div>
	<div class="form-group">
		<label for="" class="col-lg-3 control-label">Fecha de entrega</label>
		<div class="col-lg-4">
			<input type="date" name="fec_tic" class="form-control" value="" required>
		</div>
	</div>
	<div class="form-group">
		<label for="" class="col-lg-2 control-label">Hora:</label>
		<div class="col-lg-3">
			<input type="time" name="hor_tic" class="form-control" value="" required>
		</div>
	</div>
	<br/><br/>
	<br/><br/>
	<div class="col-lg-12 ">

<a href="{{route('recipe.getter')}}" class="btn btn-warning btn-raised bmd-btn-fab" style="padding-left:10px;padding-right:10px;" >
	<i class="material-icons">spellcheck</i> Ir a recetas
</a>
<button type="submit" target="_blank" class="btn btn-primary btn-raised bmd-btn-fab" style="padding-left:10px;padding-right:10px;">
	<i class="material-icons">print</i> Imprimir y guardar
</button>
</form>
</form>
<a href="javascript:void(0);" onclick="document.formid.submit()" class="btn btn-success btn-raised bmd-btn-fab" style="padding-left:10px;padding-right:10px;">
	<i class="material-icons">check</i> Finalizar
</a>
</div>
</div>




<!-- Modal !-->

  <div class="modal fade" id="miModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">Fotografia Boleta - Optica Ramirez </h4>
      </div>
      <div class="modal-body">
				{!! Form::open(['route' => 'ticket.store']) !!}
				<input type="hidden" id="tic" name="tic" value="">
				<input type="hidden" id="img" name="img" value="">
				<div id='botonera' style="margin-left:7%;">
						<button id='botonIniciar' style="padding-left:15px;" class="btn btn-raised btn-success" type='button'><i class="material-icons">play_circle_filled</i> Iniciar</button>
						<button id='botonDetener' style="padding-left:15px;" class="btn btn-raised btn-danger" type='button'><i class="material-icons">stop</i> Detener</button>
						<button id='botonFoto' type='button' style="padding-left:15px;" class="btn btn-raised btn-primary"><i class="material-icons">camera</i> Foto</button>
						<button id='' type='submit' style="padding-left:15px;" class="btn btn-raised btn-info"><i class="material-icons">check_circle</i> Guardar</button>
				</div>
				<div class="contenedor well">
						<div class="titulo">Cámara</div>
						<video id="camara" autoplay controls></video>
				</div>
				<div class="contenedor well">
						<div class="titulo">Foto</div>
						<canvas id="foto" ></canvas>
				</div>
     </div>
     <div class="modal-footer">

      </div>
    </div>
		{!! Form::close() !!}
  </div>
</div>

</div>
<!-- Modal !-->
@endsection

@section('scripts')
	<script type="text/javascript">
		$(document).on('ready', function(){
			var tickets ={!! json_encode($tickets->toArray()) !!};
			console.log(tickets);
			for(var i=0; i<tickets.length; i++)
			{
				var click="javascript:pasar('"+tickets[i].id+"');";
				tickets[i].button='<button class="btn btn-raised btn-primary" data-toggle="modal" data-target="#miModal4" onclick="'+click+'"  type="button" style="margin-top:0px; padding: 8px;"><i class="material-icons">camera_alt</i></button>';
				tickets[i].nombre=tickets[i].nam_cli+' '+tickets[i].lpa_cli+' '+tickets[i].lma_cli;
				JSON.stringify(tickets);
				console.log(tickets);
			}
			console.log(tickets);
			$('#client').dynatable({
				dataset: {
    			records: tickets
  			},
				inputs: {
    		 processingText: 'Loading <img src="{{ url('imagen/cargando.gif')}}" />'
  	 		}
			});
		});
		function pasar(id)
		{
			$('#tic').val(id);
		}
	</script>

	<script type="text/javascript">
			//Nos aseguramos que estén definidas
//algunas funciones básicas
window.URL = window.URL || window.webkitURL;
navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia || function(){alert('Su navegador no soporta navigator.getUserMedia().');};
jQuery(document).ready(function(){
	//Este objeto guardará algunos datos sobre la cámara
	window.datosVideo = {
			'StreamVideo': null,
			'url' : null
	};

	jQuery('#botonIniciar').on('click', function(e){
			//Pedimos al navegador que nos de acceso a
			//algún dispositivo de video (la webcam)
			navigator.getUserMedia({'audio':false, 'video':true}, function(streamVideo){
					datosVideo.StreamVideo = streamVideo;
					datosVideo.url = window.URL.createObjectURL(streamVideo);
					jQuery('#camara').attr('src', datosVideo.url);
			}, function(){
					alert('No fue posible obtener acceso a la cámara.');
			});
	});
	jQuery('#botonDetener').on('click', function(e){
			if(datosVideo.StreamVideo){
					datosVideo.StreamVideo.stop();
					window.URL.revokeObjectURL(datosVideo.url);
			};
	});

	jQuery('#botonFoto').on('click', function(e){
			var oCamara,
					oFoto,
					oContexto,
					w, h;

			oCamara = jQuery('#camara');
			oFoto = jQuery('#foto');
			w = oCamara.width();
			h = oCamara.height();
			oFoto.attr({'width': w, 'height': h});
			oContexto = oFoto[0].getContext('2d');
			oContexto.drawImage(oCamara[0], 0, 0, w, h);
			foto= document.getElementById('foto')
			img=foto.toDataURL();
			$('#img').val(img);

	});
});
	</script>

@endsection
