<!DOCTYPE html>
<!-- Developer: Luis Quisbert
 *  Date: 27-07-2017
 *	Hour: 20:05
 *	Comment: View login with bootstrap-material-design without sections
 */!-->
<html lang="es">
	<head>
<!--		/**Elementos de cabecera*/ !-->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-compatible" content="IE-edge">
		<link rel="shortcut icon" href="{{{ asset('imagen/optica_ramirez.png') }}}">

		<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Optica Ramirez - Bienvenido</title>
		<!-- Material Design fonts -->
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/icon?family=Material+Icons">
<!--
		/** Elementos de hojas de estilo
		*		Bootstrap, material-design
		*/
!-->
	{{ Html::style('css/login.css') }}
	{{ Html::style('bower_components/bootstrap/css/bootstrap.min.css') }}
	{{ Html::style('bower_components/bootstrap-material-design/dist/css/bootstrap-material-design.min.css') }}
	{{ Html::style('bower_components/bootstrap-material-design/dist/css/ripples.min.css') }}
  @yield('css')

	</head>
	<body class="background-login">
		<!-- Animacion de cargar pagina, usar en los modulos que son necesarios!-->
		<div id="imgLOAD" style="text-align:center;" >
			<b>Cargando...</b>
			<img src="imagen/cargando.gif" />
		</div>
		<!-- Fin del div de animacion !-->
	<div id="page" class="container" style="position:relative; z-index:1; display: none;">
				<div class="well col-md-6 col-md-offset-3 login-container" style="position:relative; z-index:0; ">
	<form class="form-horizontal" method="POST" action="login">
  <fieldset>
		<div class="form-group">
			<center>
				@if(Session::has('error_message'))
					<div class="alert alert-danger">
						{{ Session::get('error_message') }}
					</div>
				@endif
				<img src="{{url('imagen/optica_ramirez.png')}}" alt="Bienvenido a la optica Ramirez" class="img-responsive imagen-login">
			</center>
		</div>
		<center>
			<legend>Iniciar sesion - Sistema Optica Ramirez</legend>
		</center>
    <div class="form-group has-warning">
			<label class="col-md-2 control-label">Usuario</label>
  		{{ csrf_field() }}
      <div class="col-md-10" >
        <input name="nic_user" type="text" class="form-control" id="nic_user" placeholder="Nombre de usuario">
      </div>
    </div>
    <div class="form-group has-warning">
      <label for="inputPassword" class="col-md-2 control-label">Contraseña</label>

      <div class="col-md-10">
        <input type="password" name="password" class="form-control" id="password" placeholder="Ingrese su contraseña">

    <div class="form-group">
      <div class="col-md-10 col-md-offset-2">
        <button type="button" class="btn btn-danger">Limpiar campos</button>
        <button type="submit" class="btn btn-raised btn-warning">Ingresar</button>
      </div>
    </div>
  </fieldset>
</form>
				</div>
	</div>
		<!--Recursos de la animacion de carga de pagina!-->
	<script type='text/javascript'>
			window.onload = detectarCarga;
			function detectarCarga(){
				document.getElementById("imgLOAD").style.display="none";
			}
	</script>

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
      {{ Html::script('bower_components/bootstrap/js/bootstrap.min.js') }}
  		{{ Html::script('bower_components/bootstrap-material-design/dist/js/ripples.min.js') }}
      {{ Html::script('bower_components/bootstrap-material-design/dist/js/material.min.js') }}
    <script type="text/javascript">
      $(document).on('ready', function(){
        $.material.init();
      });
    </script>

	</body>
</html>
