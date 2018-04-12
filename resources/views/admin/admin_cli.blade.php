@extends('layout')

@section('title')

  Clientes - Optica ramirez

@stop

@section('content')
  <div class="well col-lg-3" style="margin-right: 2%; margin-left: 2%;">
    <div class="list-group">
    <div class="list-group-item">
  <center>
      <div class="row-picture">
        <img class="circle" src="http://lorempixel.com/56/56/people/1" alt="icon">
      </div>
      <div class="form-group"> ADMINISTRADOR</div>
      <div class="form-group"> {{Auth::user()->nam_user.' '.Auth::user()->lpa_user.' '.Auth::user()->lma_user }}</div>
    </div>
  </div>
  </center>
  </div>
  <div class="panel panel-default col-lg-8 ">
    <div class="panel-body">
      <ul class="breadcrumb">
    <li class="active">Inicio</li>
  </ul>


<fieldset>
<legend class="warning" style="height: 15px;">Clientes</legend>
<button class="btn btn-success btn-raised" data-toggle="modal" data-target="#miModal"><i class="material-icons">edit</i> Registrar nuevo </button>
<table class="table table-striped table-hover  table-responsive ">
  <thead>
  <tr>
    <th>#</th>
    <th>Nombre del paciente</th>
    <th width="30%">Datos personales</th>
    <th>Cantidad de fotografias</th>
    <th>Acciones</th>
  </tr>
  </thead>
  <tbody>
  <tr>
    <td>1</td>
    <td>Column content</td>
    <td>Column content</td>
    <td><label class="label label-success">1</label></td>
    <td><button class="btn btn-primary"><i class="material-icons">edit</i></button><button class="btn btn-default"><i class="material-icons">remove_red_eye</i></button><button class="btn btn-danger"><i class="material-icons">delete</i></button></td>
  </tr>
  <tr>
    <td>2</td>
    <td>Column content</td>
    <td>Column content</td>
    <td><label class="label label-warning">2</label></td>
    <td><button class="btn btn-primary"><i class="material-icons">edit</i></button><button class="btn btn-default"><i class="material-icons">remove_red_eye</i></button><button class="btn btn-danger"><i class="material-icons">delete</i></button></td>
  </tr>
  <tr class="info">
    <td>3</td>
    <td>Column content</td>
    <td>Column content</td>
    <td><label class="label label-success">1</label></td>
    <td><button class="btn btn-primary"><i class="material-icons">edit</i></button><button class="btn btn-default"><i class="material-icons">remove_red_eye</i></button><button class="btn btn-danger"><i class="material-icons">delete</i></button></td>
  </tr>
  <tr class="success">
    <td>4</td>
    <td>Column content</td>
    <td>Column content</td>
    <td><label class="label label-success">1</label></td>
    <td><button class="btn btn-primary"><i class="material-icons">edit</i></button><button class="btn btn-default"><i class="material-icons">remove_red_eye</i></button><button class="btn btn-danger"><i class="material-icons">delete</i></button></td>
  </tr>
  <tr class="danger">
    <td>5</td>
    <td>Column content</td>
    <td>Column content</td>
    <td><label class="label label-danger">3</label></td>
    <td><button class="btn btn-primary"><i class="material-icons">edit</i></button><button class="btn btn-default"><i class="material-icons">remove_red_eye</i></button><button class="btn btn-danger"><i class="material-icons">delete</i></button></td>
  </tr>
  <tr class="warning">
    <td>6</td>
    <td>Column content</td>
    <td>Column content</td>
    <td><label class="label label-success">1</label></td>
    <td><button class="btn btn-primary"><i class="material-icons">edit</i></button><button class="btn btn-default"><i class="material-icons">remove_red_eye</i></button><button class="btn btn-danger"><i class="material-icons">delete</i></button></td>
  </tr>
  <tr class="active">
    <td>7</td>
    <td>Column content</td>
    <td>Column content</td>
    <td><label class="label label-primary">0</label></td>
    <td><button class="btn btn-primary"><i class="material-icons">edit</i></button><button class="btn btn-default"><i class="material-icons">remove_red_eye</i></button><button class="btn btn-danger"><i class="material-icons">delete</i></button></td>
  </tr>
  </tbody>
</table>
</fieldset>
  </div>
</div>
<!-- Modal !-->

  <div class="modal fade" id="miModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">Registrar nuevo paciente</h4>
      </div>
      <div class="modal-body">
        <div class="form-group has-primary">
          <label class="col-md-4 control-label">Nombres</label>
        <div class="col-md-8" >
          <input type="text" name="" class="form-control">
        </div></div>
        <div class="form-group has-primary">
          <label class="col-md-4 control-label">Apellido paterno</label>
        <div class="col-md-8" >
          <input type="text" name="" class="form-control">
        </div></div>
        <div class="form-group has-primary">
          <label class="col-md-4 control-label">Apellido materno</label>
        <div class="col-md-8" >
          <input type="text" name="" class="form-control">
        </div></div>
        <div class="form-group has-primary">
          <label class="col-md-4 control-label">Telefono</label>
        <div class="col-md-8" >
          <input type="text" name="" class="form-control">
        </div></div>
        <div class="form-group has-primary">
          <label class="col-md-4 control-label">Direccion</label>
        <div class="col-md-8" >
          <input type="text" name="" class="form-control">
        </div></div>
        <div class="form-group has-primary">
          <label class="col-md-4 control-label">Edad</label>
        <div class="col-md-8" >
          <input type="text" name="" class="form-control">
        </div>

        </div>
     <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="material-icons">close</i>Cerrar</button>
        <button type="button" class="btn btn-primary"><i class="material-icons">check</i>Guardar</button>
      </div>
    </div>
  </div>
</div>

</div>
</div>
@stop
