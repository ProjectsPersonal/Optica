@extends('../layout')
@section('title')
  Formulario de registro de boletas manual - Optica Ramirez
@endsection
@section('css')
<style type="text/css">
    .contenedor{ margin-left: 6%;float: left;}
    .titulo{ font-size: 12pt; font-weight: bold;}
    #camara, #foto{
        width: 480px;
        min-height: 280px;
    }
</style>
@endsection
@section('content')
<div class="container-fluid">
  <div class="well col-lg-12" >
<fieldset>
  <legend>Registro rapido</legend>
  {!! Form::open(['route' => 'ticketfast.store']) !!}
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

</fieldset>

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
</div>
@endsection
@section('scripts')
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
