<!DOCTYPE html>
<!-- Developer: Luis Quisbert
 *  Date: 28-07-2017
 *	Hour: 13:36
 *	Comment: View layout with defined sections!-->
<html lang="es">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
	<link rel="shortcut icon" href="{{{ asset('imagen/optica_ramirez.png') }}}">
	<title>@yield('title')</title>
<!--
		/** Elementos de hojas de estilo
		*		Bootstrap, material-design
		*/
!-->
{!! Html::style('css/fonts-google.css') !!}
{!! Html::style('css/login.css') !!}
{!! Html::style('bower_components/bootstrap/css/bootstrap.min.css') !!}
{!! Html::style('dynatable/jquery.dynatable.css') !!}
{!! Html::style('bower_components/bootstrap-material-design/dist/css/bootstrap-material-design.css') !!}
{!! Html::style('bower_components/bootstrap-material-design/dist/css/ripples.min.css') !!}
	@yield('css')
</head>
<body style="background-image: url('{{ url('imagen/layout2.png') }}'); background-size: 110px;">
<!-- Animacion de cargar pagina, usar en los modulos que son necesarios!-->
		<div id="imgLOAD" style="text-align:center; position:absolute; cursor: wait;">

			<b>Cargando...</b>
			<img src="{{ url('imagen/cargando.gif') }}" />
		</div>
		<!-- Fin del div de animacion !-->
		@php
			if(Session::has('mensaje')):
		@endphp
		<div class="alert alert-success alerta" id="good" style=" border-radius: 7px; ">
			<button type="button" class="close" data-dismiss="alert">x</button>
			<strong>Exito! </strong>
			{{ Session::get('mensaje')}}
		</div>
		@php
			endif;
			if(Session::has('mensaje2')):
		@endphp
		<div class="alert alert-danger alerta" id="wrong" style=" border-radius: 7px; ">
			<button type="button" class="close" data-dismiss="alert">x</button>
			<strong>Alerta! </strong>
			{{ Session::get('mensaje2')}}
		</div>
		@php
			endif;
		@endphp

		<!-- Menu vertical !-->
<div class="container-fluid">

<div id="page" class="container-fluid"  style="position:relative;  display: none;">

	<div class="navbar navbar-warning">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-warning-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="javascript:void(0)"><img src="{{ url('imagen/optica_ramirez.png') }}" height="30px;"></a>
    </div>
    <div class="navbar-collapse collapse navbar-warning-collapse">
      <ul class="nav navbar-nav">
        <li class="active"><a href="{{route('index')}}">Inicio</a></li>
        <li><a href="{{route('client.index')}}">Pacientes</a></li>
        <li class="dropdown">
          <a href="bootstrap-elements.html" data-target="#" class="dropdown-toggle" data-toggle="dropdown">Historial
            <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="javascript:void(0)">Pendientes</a></li>
            <li><a href="javascript:void(0)">Ver todos</a></li>
            <li class="divider"></li>
            <li class="dropdown-header">Administrar historial</li>
			></li>
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
      	<li><a>Tipo de usuario:
      <?php
			/*
				*CODIGO PHP PARA DETERMINAR EL TIPO DE USUARIO
			*/
       $level= \optica\Profile::where('id_user','=',Auth::user()->id)->first();
       if($level->lvl_pro==0):
         $level='ADMINISTRADOR';
       else:
         $level='USUARIO COMUN';
       endif;
      ?> {{ $level }}</a></li>
        <li><a title="Bloquear pantalla" href="#" onclick="launchFullScreen(document.documentElement);"><i class="material-icons">fullscreen</i></a> </li>
        <li><a href="{{ route('logouttemp') }}" title="Bloquear pantalla"><i class="material-icons">lock</i></a> </li>
        <li class="dropdown">
          <a href="bootstrap-elements.html" data-target="#" class="dropdown-toggle" data-toggle="dropdown" title="Configuraciones generales"><i class="material-icons">settings</i>
            <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="{{ route('changepassword.index')}}">Cambiar contraseña</a></li>
            <li><a class="" data-toggle="modal" data-target="#myModal" >Ver perfil</a></li>
          </ul>
        </li>
				<li><a href="{{ url('logout')}}" title="Cerrar sesion"><i class="material-icons">power_settings_new</i></a> </li>
      </ul>
    </div>
  </div>
</div>
@yield('content')
</div>
</div>

<!--Ventanas modales de la pagina!-->
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h6 class="modal-title">DATOS PERSONALES</h4>
      </div>
      <div class="modal-body">
				<div class="form-group has-warning">
	  			<label class="col-md-2 control-label">Fecha de creacion de cuenta</label>
	        <div class="col-md-10" >
	          <input name="nic_user" type="text" class="form-control" id="created_at_user" value="{{Auth::user()->created_at}}" readonly>
	        </div>
	      </div>
				<div class="form-group has-warning">
					<?php
					$lvl_id=Auth::user()->id;
					$level=\optica\Profile::where('id_user','=',$lvl_id)->first();
					 ?>
	  			<label class="col-md-2 control-label">Tipo de usuario</label>
	        <div class="col-md-10" >
	          <input name="nic_user" type="text" class="form-control" id="created_at_user" value="<?php
						if($level->lvl_pro==0):
							echo 'ADMINISTRADOR';
					  else:
							echo 'USUARIO COMUN';
						endif;
						?>" readonly>
	        </div>
	      </div>
				<div class="form-group has-warning">
	  			<label class="col-md-2 control-label">Fecha de caducidad de la cuenta</label>
	        <div class="col-md-10" >
	          <input name="nic_user" type="text" class="form-control" id="created_at_user" value="{{$level->ini_pro}}" readonly>
						<div class="form-group has-warning">
	        </div>
	      </div>
	  			<label class="col-md-2 control-label">Nick de usuario</label>
	        <div class="col-md-10">
	          <input name="nic_user" type="text" class="form-control col-md-4" id="nic_user" value="{{Auth::user()->nic_user}}" readonly>
	        </div>
	      </div>
	      <div class="form-group has-warning">
	  			<label class="col-md-2 control-label">Nombres:</label>
	        <div class="col-md-10">
	          <input name="nic_user" type="text" class="form-control col-md-4" id="nam_user" value="{{Auth::user()->nam_user}}" readonly>
	        </div>
	      </div>
	      <div class="form-group has-warning">
	  			<label class="col-md-2 control-label">Apellido Paterno</label>
	        <div class="col-md-10">
	          <input name="nic_user" type="text" class="form-control col-md-4" id="lpa_user" value="{{Auth::user()->lpa_user}}" readonly>
	        </div>
	      </div>
	      <div class="form-group has-warning">
	        <label class="col-md-2 control-label">Apellido Materno</label>
	        <div class="col-md-10">
	          <input name="nic_user" type="text" class="form-control col-md-4" id="lma_user" value="{{Auth::user()->lma_user}}" readonly>
	        </div>
	      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i>X</i> Cerrar</button>
      </div>
    </div>
  </div>
</div>


<!--Recursos de la animacion de carga de pagina!-->
	<script type='text/javascript'>
			window.onload = detectarCarga;
			function detectarCarga(){
				document.getElementById("imgLOAD").style.display="none";
				document.getElementById("page").style.display="block";

			}
	</script>
    <!--  Elementos de javascript
    *   Bootstrap, material-design
     -->
	 {{ Html::script('bower_components/jquery/dist/jquery.min.js') }}
	 {{ Html::script('bower_components/moment/min/moment.min.js') }}
	 {{ Html::script('bower_components/fullcalendar/dist/fullcalendar.js') }}
	 {{ Html::script('bower_components/bootstrap/js/bootstrap.min.js') }}
	 {{ Html::script('bower_components/bootstrap-material-design/dist/js/ripples.min.js') }}
	 {{ Html::script('bower_components/bootstrap-material-design/dist/js/material.min.js') }}
	 {{ Html::script('dynatable/jquery.dynatable.js') }}
	 @yield('scripts')
    <script type="text/javascript">
      $(document).on('ready', function(){
        $.material.init();
      });
    </script>
		<script type="text/javascript">
		$(document).ready(function() {
			setTimeout(function(){
				$(".alerta").fadeIn(2500); },0000);
			});
		$(document).ready(function() {
			setTimeout(function(){
				$(".alerta").fadeOut(2500); },5000);
			});
			function launchFullScreen(element) {
  			if(element.requestFullScreen) {
    			element.requestFullScreen();
  			} else if(element.mozRequestFullScreen) {
    			element.mozRequestFullScreen();
  			} else if(element.webkitRequestFullScreen) {
    			element.webkitRequestFullScreen();
  			}
			}
		</script>
</body>

</html>
