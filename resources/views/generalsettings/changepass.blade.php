@extends('../layout')
@section('title')
    Cambiar contraseña - Optica Ramirez
@endsection

@section('content')
  <div class="container-fluid">
    <div class="well col-md-10 col-md-offset-1">
    <fieldset>
      <legend>Datos de usuario - {{Auth::user()->nam_user.' '.Auth::user()->lpa_user.' '.Auth::user()->lma_user.' '}} <button type="button" onclick="javascript:editar()" name="btn btn-default"><i class="material-icons">edit</i></button>
</legend>
      <div class="form-group has-warning">
  			<label class="col-md-2 control-label">Fecha de creacion de cuenta</label>
        <div class="col-md-10" >
          <input name="nic_user" type="text" class="form-control" id="created_at_user" value="{{Auth::user()->created_at}}" readonly>
        </div>
      </div>
      <div class="form-group has-warning">
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
    </fieldset>
    <div id="changepass" style="display:none;">
    <fieldset>
      <legend class="label label-danger" style="font-size:13px;">Cambiar contraseña</legend>
      <div class="form-group has-warning">
        <label class="col-md-2 control-label">Nueva contraseña</label>
        <div class="col-md-10">
          <input name="nic_user" type="password" class="form-control col-md-4" id="pass_user" value="" >
        </div>
      </div>
      <div class="form-group has-warning">
        <label class="col-md-2 control-label">Repita contraseña</label>
        <div class="col-md-10">
          <input name="nic_user" type="password" class="form-control col-md-4" id="passver_user" value="" >
        </div>
      </div>
      <button type="submit" class="btn btn-lg btn-block btn-raised btn-success" name="button"><i class="material-icons">send</i> Guardar cambios</button>
    </fieldset>
    </div>
  </div>
</div>
      </div>
@endsection
@section('scripts')
  <script type="text/javascript">
    function editar()
     {
       $('#changepass').css('display','block');
       document.getElementById('nam_user').readOnly = false;
       document.getElementById('lpa_user').readOnly = false;
       document.getElementById('lma_user').readOnly = false;
       document.getElementById('nic_user').readOnly = false;
     }
  </script>
@endsection
