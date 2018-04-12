@extends('../layout')
@section('title')
  Registro de gastos - Optica Ramirez
@endsection
@section('css')

@endsection
@section('content')
<div class="container-fluid">
<div class="well col-md-12">
<fieldset>
<legend>
  Lista de gastos realizados
</legend>
<form class="form-horizontal" action="" method="post">
<div class="table-responsive">
  <button type="button" name="button" class="btn btn-danger btn-raised" data-toggle="modal" data-target="#miModal"><i class="material-icons">card_giftcard</i> Nuevo gasto</button> <br/><br/>
<table class="table table-hover" id="inventory">
<thead>
  <th data-dynatable-column="fec_exp">Fecha</th>
  <th data-dynatable-column="des_exp">Concepto</th>
  <th data-dynatable-column="mon_exp">Monto</th>
  <th data-dynatable-column="user">Usuario</th>
  <th data-dynatable-column="button">Acciones</th>
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
        <h4 class="modal-title">Registro de gasto</h4>
      </div>
      <div class="modal-body">
				{!! Form::open(['route' => 'admin.expstore']) !!}
        <div class="form-group has-danger">
          <label class="col-md-4 control-label">Descripcion</label>
        <div class="col-md-8" >
          <input type="text" name="des_exp" class="form-control" required>
        </div></div>
        <div class="form-group has-danger">
          <label class="col-md-4 control-label">Monto</label>
        <div class="col-md-8" >
          <input type="text" name="mon_exp" class="form-control" required>
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
<!-- Modal -->
<div id="modexpensemodi" class="modal fade" role="dialog">
<div class="modal-dialog">

<!-- Modal content-->
<div class="modal-content">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Registro de gasto</h4>
  </div>
  <div class="modal-body">
    <form class="form-horizontal" role="form" method="POST" action="{{route('admin.expupdate')}}">
      {{csrf_field()}}
      <input type="hidden" class="form-control" id="id_expense_up" name="idexp" value="">
      <div class="form-group">
        <label name="nom_adm" for="nom_clie" class="col-lg-4 control-label">Descripcion: </label>
        <div class="col-lg-8">
          <input type="text" class="form-control" id="dess" name="des_exp"
                 placeholder="descripcion">
        </div>
      </div>
      <div class="form-group">
        <label name="pat_adm" for="pat_cli" class="col-lg-4 control-label">Monto: </label>
        <div class="col-lg-8">
          <input type="text" class="form-control" id="mon"  name="mon_exp"
                 placeholder="monto">
        </div>
      </div>
      <div class="form-group">
        <label name="mat_adm" for="mat_cli" class="col-lg-4 control-label">Fecha: </label>
        <div class="col-lg-8">
          <input type="datetime" class="form-control" id="fech"  name="fec_exp">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-raised" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-warning btn-raised" data-toggle="modal" data-target="#expense">Registrar</button>
      </div>
    </form>

  </div>

</div>

</div>
</div>
<!--fin del Modal content-->
<!-- Modal -->
<div id="eliminaModgasto" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">ELIMINAR GASTO</h4>
      </div>
      <form class="" action="{{route('admin.expdelete')}}" method="post">
        {{csrf_field()}}
        <input type="hidden" class="form-control" id="id_expense_del" name="id" value="">
      <div class="modal-body">
        <p>Esta seguro de eliminar el gasto?</p>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-danger">ELIMINAR</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">CERRAR</button>
      </div>
    </div>

  </form>

  </div>
</div
<!--fin del Modal content-->
@endsection
@section('scripts')
  <script type="text/javascript">
    $(document).on('ready', function(){
      var expense ={!! json_encode($expense->toArray()) !!};
      for (var i = 0; i < expense.length; i++) {
        var id=expense[i].id;
        var des=expense[i].des_exp;
        var mon=expense[i].mon_exp;
        var fec=expense[i].fec_exp;
        var b="'"+id+"','"+des+"','"+mon+"','"+fec+"'";
        expense[i].button='<a onclick="javascript:envioexpense('+id+');" class="btn btn-warning btn-raised btn-lg active" role="button" data-toggle="modal" data-target="#eliminaModgasto" style="background-color:#ed1414; color: #fff;"><i class="glyphicon glyphicon-trash"></i></a><a onclick="javascript:enviodatosexpense('+b+');" class="btn btn-warning btn-raised btn-lg active" role="button" data-toggle="modal" data-target="#modexpensemodi" color: #fff;"><i class="material-icons">mode_edit</i></a>';
        expense[i].user=expense[i].nam_user+' '+expense[i].lpa_user+' '+expense[i].lma_user;
      }
      $('#inventory').dynatable({
        dataset: {
          records:expense
        },
        inputs: {
         processingText: 'Loading <img src="{{ url('imagen/cargando.gif')}}" />'
        }
      });
    });
    function envioexpense(id){
          $('#id_expense_del').val(id);
        }
    function enviodatosexpense(id,des,mon,fec){
            $('#id_expense_up').val(id);
            $('#dess').val(des);
            $('#mon').val(mon);
            $('#fech').val(fec);
        }
  </script>
@endsection
