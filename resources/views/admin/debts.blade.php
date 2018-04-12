@extends('../layout')
@section('title')
  Registro de deudas - Optica Ramirez
@endsection
@section('css')

@endsection
@section('content')
<div class="container-fluid">
<div class="well col-md-12">
<fieldset>
<legend>
  Lista de deudas pendientes
</legend>
<form class="form-horizontal" action="{{route('admin.storedebt')}}" method="post">
<div class="table-responsive">
  <button type="button" name="button" class="btn btn-danger btn-raised" data-toggle="modal" data-target="#miModal"><i class="material-icons">card_giftcard</i> Registrar nueva deuda</button> <br/><br/>
<table class="table table-hover" id="debt">
<thead>
  <th data-dynatable-column="id">Codigo</th>
  <th data-dynatable-column="nom_deb">Nombre</th>
  <th data-dynatable-column="con_deb">Condeb</th>
  <th data-dynatable-column="mon_deb">Monto</th>
  <th data-dynatable-column="fec_deb">Fecha inicio</th>
  <th data-dynatable-column="fin_deb">Fecha final</th>
  <th data-dynatable-column="id_user">ID usuario</th>
  <td data-dynatable-column="boton">ELIMINAR</td>
  <td data-dynatable-column="boton2">MODIFICAR</td>
</thead>
<tbody>

</tbody>
</table>
</div>
</form>
</fieldset>
</div>
</div>
<!-- Modal !-->

  <div class="modal fade" id="miModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">Registro de deuda</h4>
      </div>
      <div class="modal-body">
				{!! Form::open(['route' => 'admin.storedebt']) !!}
        <div class="form-group has-danger">
          <label class="col-md-4 control-label">Nombre:</label>
        <div class="col-md-8" >
          <input type="text" name="nom_deb" class="form-control" required>
        </div></div>
        <div class="form-group has-danger">
          <label class="col-md-4 control-label">Con_deb:</label>
        <div class="col-md-8" >
          <input type="text" name="con_deb" class="form-control" required>
        </div></div>
        <div class="form-group has-danger">
          <label class="col-md-4 control-label">Monto:</label>
        <div class="col-md-8" >
          <input type="text" name="mon_deb" class="form-control" required>
        </div></div>
        <div class="form-group has-danger">
          <label class="col-md-4 control-label">Fecha de prestamo:</label>
        <div class="col-md-8" >
          <input type="date" name="fec_deb" class="form-control" required>
        </div></div>
        <div class="form-group has-danger">
          <label class="col-md-4 control-label">Fecha de cancelacion:</label>
        <div class="col-md-8">
          <input type="date" name="fin_deb" class="form-control" required>
				</div></div>
        </div>
     <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="material-icons">close</i>Cerrar</button>
        <button type="submit" class="btn btn-primary"><i class="material-icons">check</i>Guardar</button>
      </div>
    </div>
		{!! Form::close() !!}
  </div>
</div>



<div class="modal fade" id="updModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      <h4 class="modal-title">Registro de deuda</h4>
    </div>
    <div class="modal-body">
      {!! Form::open(['route' => 'admin.storedebt']) !!}
      <div class="form-group has-danger">
        <label class="col-md-4 control-label">Nombre:</label>
      <div class="col-md-8" >
        <input type="text" name="nom_deb" class="form-control" required>
      </div></div>
      <div class="form-group has-danger">
        <label class="col-md-4 control-label">Con_deb:</label>
      <div class="col-md-8" >
        <input type="text" name="con_deb" class="form-control" required>
      </div></div>
      <div class="form-group has-danger">
        <label class="col-md-4 control-label">Monto:</label>
      <div class="col-md-8" >
        <input type="text" name="mon_deb" class="form-control" required>
      </div></div>
      <div class="form-group has-danger">
        <label class="col-md-4 control-label">Fecha de prestamo:</label>
      <div class="col-md-8" >
        <input type="date" name="fec_deb" class="form-control" required>
      </div></div>
      <div class="form-group has-danger">
        <label class="col-md-4 control-label">Fecha de cancelacion:</label>
      <div class="col-md-8">
        <input type="date" name="fin_deb" class="form-control" required>
      </div></div>
      </div>
   <div class="modal-footer">
      <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="material-icons">close</i>Cerrar</button>
      <button type="submit" class="btn btn-primary"><i class="material-icons">check</i>Guardar</button>
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
      var debts ={!! json_encode($debts->toArray()) !!};
      for (var i = 0; i < debts.length; i++) {

        var id=debts[i].id;
        var nom_deb=debts[i].nom_deb;
        var con_deb=debts[i].con_deb;
        var fec_deb=debts[i].fec_deb;
        var fin_deb=debts[i].fin_deb;
        var id_user=debts[i].id_user;
        var b="'"+id+"','"+nom_deb+"','"+con_deb+"','"+fec_deb+"','"+fin_deb+"','"+id_user+"'";
        debts[i].boton='<a onclick="javascript:pasa('+id+');" class="btn btn-primary btn-lg active" role="button" data-toggle="modal" data-target="#eliminaMod" style="background-color:#ed1414; color: #fff;" >BORRAR</a>';
        debts[i].boton='<a onclick="javascript:pasadatos('+b+');" class="btn btn-primary btn-lg active" role="button" data-toggle="modal" data-target="#updModal" style="background-color:#1464ed; color: #fff;" >MODIFICAR</a>';

      }
      console.log(debts);
      $('#debt').dynatable({
          dataset:{records:debts},
      });
    });
  </script>
@endsection
