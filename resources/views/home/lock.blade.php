<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Optica ramirez | Sesion bloqueada</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  {!! Html::style('bower_components/bootstrap/css/bootstrap.min.css') !!}
  <!-- Font Awesome -->
  {!! Html::style('bower_components/font-awesome/css/font-awesome.min.css') !!}
  <!-- Ionicons -->
  {!! Html::style('bower_components/Ionicons/css/ionicons.min.css') !!}
  <!-- Theme style -->
  {!! Html::style('dist/css/AdminLTE.min.css') !!}

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
    {!! Html::style('css/fonts-google.css') !!}
</head>
<body class="hold-transition lockscreen" style="background-color:  #ff9759">
<!-- Automatic element centering -->
<div class="lockscreen-wrapper">
  <div class="lockscreen-logo">
    <a><b>Optica</b>Ramirez</a>
  </div>
  <!-- User name -->
  <div class="lockscreen-name">{{$datos->nam_user.' '.$datos->lpa_user.' '.$datos->lma_user}}</div>

  <!-- START LOCK SCREEN ITEM -->
  <div class="lockscreen-item">
    <!-- lockscreen image -->
    <div class="lockscreen-image" style="background-color: #FF5800; ">
      <img src="{{ url('imagen/optica_ramirez.png')}}" alt="{{ $datos->nam_user }}">
    </div>
    <!-- /.lockscreen-image -->

    <!-- lockscreen credentials (contains the form) -->
    <form class="lockscreen-credentials" method="POST" action="login" >
      <div class="input-group">
        {{ csrf_field() }}
        <input type="hidden" name="nic_user" value="{{$datos->nic_user}}">
        <input type="password" class="form-control" name="password" placeholder="Contraseña">

        <div class="input-group-btn">
          <button type="submit" class="btn"><i class="fa fa-arrow-right text-muted"></i></button>
        </div>
      </div>
    </form>
    <!-- /.lockscreen credentials -->

  </div>
  <!-- /.lockscreen-item -->
  <div class="help-block text-center">
    Ingrese su contraseña para volver a la sesion actual
  </div>
  <div class="text-center">
    <a href="{{route('/login')}}">O pruebe con otro usuario y contraseña</a>
  </div>
  <div class="lockscreen-footer text-center">
    Copyright &copy; 2017 <b><a href="" class="text-black">CODEV - ASOCIADOS</a></b><br>

  </div>
</div>
<!-- /.center -->

<!-- jQuery 3 -->
{!! Html::script('bower_components/jquery/dist/jquery.min.js') !!}
<!-- Bootstrap 3.3.7 -->
{!! Html::script('bower_components/bootstrap/js/bootstrap.min.js') !!}

</body>
</html>
