@extends('../../layout')
@section('title')
  Arreglos - Optica Ramirez
@endsection
@section('css')

@endsection
@section('content')
<div class="container-fluid">
  <div class="well col-lg-11" style="margin-left:4%;">
    <fieldset>
      <legend>Arreglos - Optica Ramirez</legend>
    <!--desde aqui el codigo de la tabla!-->
    <button type="button" class="btn btn-danger btn-raised" data-toggle="modal" data-target="#modarray"><i class="material-icons">edit</i> Registro</button>

    <div class="table-responsive">
      <table class="table" id="array">
        <thead>
          <tr class="warning" >
            <th>ID</th>
            <th data-dynatable-column="nam_cli">NOMBRE</th>
            <th data-dynatable-column="dat_ent">FECHA ENTREGA</th>
            <th data-dynatable-column="num_bol">BOLETA</th>
            <th data-dynatable-column="cue_arr">A CUENTA</th>
            <th data-dynatable-column="sal_arr">SALDO</th>
            <th data-dynatable-column="button">ACCIONES</th>
          </tr>
        </thead>
        <tbody>
          <tr>
          </tr>
        </tbody>
      </table>
  </div>

</fieldset>
      <!--hasta aqui las tablas!-->


</div>
</div>
<!-- Modal -->
<div id="see" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">DETALLES DE ARREGLO</h4>
      </div>
      <div class="modal-body">

        <div class="form-group">
          <label name="nom_adm" for="nom_clie" class="col-lg-4 control-label">Fecha recibo: </label>
          <div class="col-lg-8">
            <input type="text" class="form-control" id="dat_rec" name="dat_rec" readonly="readonly">
          </div>
        </div>
        <div class="form-group">
          <label name="pat_adm" for="pat_cli" class="col-lg-4 control-label">Fecha entrega: </label>
          <div class="col-lg-8">
            <input type="text" class="form-control" id="dat_ent"  name="dat_ent" readonly="readonly">
          </div>
        </div>
        <div class="form-group">
          <label name="mat_adm" for="mat_cli" class="col-lg-4 control-label">Descripcion: </label>
          <div class="col-lg-8">
            <input type="text" class="form-control" id="des_array"  name="des_array" readonly="readonly">
          </div>
        </div>
        <div class="form-group">
          <label name="mat_adm" for="mat_cli" class="col-lg-4 control-label">Cliente: </label>
          <div class="col-lg-8">
            <input type="text" class="form-control" id="nam_cli"  name="nam_cli" readonly="readonly">
          </div>
        </div>
        <div class="form-group">
          <label name="mat_adm" for="mat_cli" class="col-lg-4 control-label">Montura: </label>
          <div class="col-lg-8">
            <input type="text" class="form-control" id="mon_arr"  name="mon_arr" readonly="readonly">
          </div>
        </div>
        <div class="form-group">
          <label name="mat_adm" for="mat_cli" class="col-lg-4 control-label">Material: </label>
          <div class="col-lg-8">
            <input type="text" class="form-control" id="mat_arr"  name="mat_arr" readonly="readonly">
          </div>
        </div>
        <div class="form-group">
          <label name="mat_adm" for="mat_cli" class="col-lg-4 control-label">Cuenta: </label>
          <div class="col-lg-8">
            <input type="number" class="form-control" id="cue_arr"  name="cue_arr" readonly="readonly">
          </div>
        </div>
        <div class="form-group">
          <label name="mat_adm" for="mat_cli" class="col-lg-4 control-label">Saldo: </label>
          <div class="col-lg-8">
            <input type="number" class="form-control" id="sal_arr"  name="sal_arr" readonly="readonly">
          </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="material-icons">close</i>Cerrar</button>
      </div>
    </div>

  </div>
</div>
<!-- Modal !-->


<!-- Modal -->
<div id="modarray" class="modal fade" role="dialog">
<div class="modal-dialog">

<!-- Modal content-->
<div class="modal-content">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Registro de arreglos</h4>
  </div>
  <div class="modal-body">
    <form class="form-horizontal" role="form" method="POST" action="{{route('arrangement.store')}}">
      {{csrf_field()}}
      <div class="form-group">
        <label name="nom_adm" for="nom_clie"  class="col-lg-4 control-label">Fecha recibo: </label>
        <div class="col-lg-8">
          <input type="date" value="{{\Carbon\Carbon::now()->format('Y-m-d')}}" class="form-control" id="nom_clie" name="dat_rec">
        </div>
      </div>
      <div class="form-group">
        <label name="pat_adm" for="pat_cli" class="col-lg-4 control-label">Fecha entrega: </label>
        <div class="col-lg-8">
          <input type="date" class="form-control" id="pat_cli"  name="dat_ent">
          <input type="time" class="form-control" id="pat_cli"  name="dat_ent2">
        </div>
      </div>
      <div class="form-group">
        <label name="mat_adm" for="mat_cli" class="col-lg-4 control-label">Descripcion: </label>
        <div class="col-lg-8">
          <input type="text" class="form-control" id="mat_cli"  name="des_array"
                 placeholder="Descripcion">
        </div>
      </div>


      <div class="form-group">
        <label name="mat_adm" for="mat_cli" class="col-lg-4 control-label">Cliente: </label>
        <div class="col-lg-8">
          <input type="text" class="form-control" id="mat_cli"  name="nam_cli"
                 placeholder="Nombre cliente">
        </div>
      </div>
      <div class="form-group">
        <label name="mat_adm" for="mat_cli" class="col-lg-4 control-label">Montura: </label>
        <div class="col-lg-8">
          <input type="text" class="form-control" id="mat_cli"  name="mon_arr"
                 placeholder="Montura">
        </div>
      </div>
      <div class="form-group">
        <label name="mat_adm" for="mat_cli" class="col-lg-4 control-label">Material: </label>
        <div class="col-lg-8">
          <input type="text" class="form-control" id="mat_cli"  name="mat_arr"
                 placeholder="Material">
        </div>
      </div>
      <div class="form-group">
        <label name="mat_adm" for="mat_cli" class="col-lg-4 control-label">Cuenta: </label>
        <div class="col-lg-8">
          <input type="number" class="form-control" id="mat_cli"  name="cue_arr"
                 placeholder="A cuenta">
        </div>
      </div>
      <div class="form-group">
        <label name="mat_adm" for="mat_cli" class="col-lg-4 control-label">Saldo: </label>
        <div class="col-lg-8">
          <input type="number" class="form-control" id="mat_cli"  name="sal_arr"
                 placeholder="Saldo">
        </div>
      </div>
  </div>
  <div class="modal-footer">
      <button type="submit" class="btn btn-warning btn-raised" data-toggle="modal" data-target="#sale">Registrar</button>
    <button type="button" class="btn btn-raised btn-danger" data-dismiss="modal"><i class="material-icons">close</i>Cerrar</button>
  </div>
</div>
</form>
</div>
</div>
<!--fin del Modal content-->
<!-- Modal -->
<div id="modarraymodi" class="modal fade" role="dialog">
<div class="modal-dialog">

<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title">Registro de arreglos</h4>
</div>
<div class="modal-body">
<form class="form-horizontal" role="form" method="POST" action="{{route('admin.updatearray')}}">
  {{csrf_field()}}
  <div class="form-group">
    <input type="hidden" class="form-control" id="id_array_up" name="id" value="">
    <label name="nom_adm" for="nom_clie" class="col-lg-4 control-label">Fecha recibo: </label>
    <div class="col-lg-8">
      <input type="datetime" class="form-control" id="datrec" name="dat_rec">
    </div>
  </div>
  <div class="form-group">
    <label name="pat_adm" for="pat_cli" class="col-lg-4 control-label">Fecha entrega: </label>
    <div class="col-lg-8">
      <input type="datetime" class="form-control" id="datent"  name="dat_ent">
    </div>
  </div>
  <div class="form-group">
    <label name="mat_adm" for="mat_cli" class="col-lg-4 control-label">Descripcion: </label>
    <div class="col-lg-8">
      <input type="text" class="form-control" id="des"  name="des_array"
             placeholder="descripcion">
    </div>
  </div>
  <div class="form-group">
    <label name="mat_adm" for="mat_cli" class="col-lg-4 control-label">Num bol: </label>
    <div class="col-lg-8">
      <input type="number" class="form-control" id="num"  name="num_bol"
             placeholder="num_bol">
    </div>
  </div>
  <div class="center-block">
    <button type="submit" class="btn btn-warning btn-raised" data-toggle="modal" data-target="#sale">Registrar</button>
  </div>
</form>

</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>
</div>

</div>
</div>
<!--fin del Modal content-->
<!-- Modal -->
<div id="eliminaModArray" class="modal fade" role="dialog">
<div class="modal-dialog">

<!-- Modal content-->
<div class="modal-content">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <form class="" action="{{route('admin.deletearray')}}" method="post">
      {{csrf_field()}}
    <input type="hidden" class="form-control" id="id_array_del" name="id" value="">
    <h4 class="modal-title">ELIMINAR ARREGLO</h4>
  </div>
  <div class="modal-body">
    <p>Esta seguro de eliminar el arreglo?</p>
  </div>
  <div class="modal-footer">
    <button type="submit" class="btn btn-danger">ELIMINAR</button>
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
  </div>
  </form>
</div>

</div>
</div>
<!--fin del Modal content-->
@endsection
@section('scripts')
  <script type="text/javascript">
    $(document).on('ready', function(){

      var arrays ={!! json_encode($arrays->toArray()) !!};
      console.log(arrays);
      for(var i=0; i<arrays.length; i++)
      {
        var a='{{route("admin.admin")}}';
        var id=arrays[i].id;
        var datrec=arrays[i].dat_rec;
        var datent=arrays[i].dat_ent;
        var des=arrays[i].des_array;
        var num=arrays[i].num_bol;
        var iduser=arrays[i].id_user;
        var namcli=arrays[i].nam_cli;
        var mon=arrays[i].mon_arr;
        var mat=arrays[i].mat_arr;
        var cue=arrays[i].cue_arr;
        var sal=arrays[i].sal_arr;

        var b="'"+id+"','"+datrec+"','"+datent+"','"+des+"','"+num+"','"+iduser+"','"+namcli+"','"+mon+"','"+mat+"','"+cue+"','"+sal+"'";
        arrays[i].boton='<a onclick="javascript:envioarray('+id+');" class="btn btn-warning btn-raised btn-lg active" role="button" data-toggle="modal" data-target="#eliminaModArray" style="background-color:#ed1414; color: #fff;" ><i class="glyphicon glyphicon-trash"></i></a><a onclick="javascript:enviodatosarray('+b+');" class="btn btn-warning btn-raised btn-lg active" role="button" data-toggle="modal" data-target="#modarraymodi" color: #fff;"><i class="material-icons">mode_edit</i></a>';



        arrays[i].button='<a class="btn btn-raised btn-warning" onclick="javascript:pasadatos('+b+');" data-toggle="modal" data-target="#see" style="margin-top:0px; padding: 8px;"><i class="material-icons">supervisor_account</i> Ver</a><a class="btn btn-raised btn-primary" target="_blank" href="ticket_print/'+arrays[i].id+'" style="margin-top:0px; padding: 8px;"><i class="material-icons">print</i> Imprimir boleta</a>';
        JSON.stringify(arrays);
        console.log(arrays);
      }
      console.log(arrays);
      $('#array').dynatable({
        dataset: {
          records: arrays
        },
        inputs: {
         processingText: 'Loading <img src="{{ url('imagen/cargando.gif')}}" />'
        }
      });
    });
    function pasadatos(id,datrec,datent,des,num,iduser,namcli,mon,mat,cue,sal){
      $('#id').val(id);
      $('#dat_rec').val(datrec);
      $('#dat_ent').val(datent);
      $('#des_array').val(des);
      $('#num_bol').val(num);
      $('#id_user').val(iduser);
      $('#nam_cli').val(namcli);
      $('#mon_arr').val(mon);
      $('#mat_arr').val(mat);
      $('#cue_arr').val(cue);
      $('#sal_arr').val(sal);
    }
  </script>
@endsection
