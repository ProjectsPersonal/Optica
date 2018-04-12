@extends('../layout')
@section('title')
  Control de personal - Optica Ramirez
@endsection
@section('css')
@endsection
@section('content')
  <div class="container-fluid">
    <div class="well">
      <fieldset>
        <legend>Personal - Optica Ramirez</legend>
        <button type="button" data-toggle="modal" data-target="#miModal" class="btn btn-raised btn-danger" name="button"><i class="material-icons">edit</i> Nuevo usuario</button>
        <div class="table-responsive">
          <table class="table table-hover" id="users">
            <thead>
              <tr>
                <th data-dynatable-column="nam_user">NOMBRE</th>
                <th data-dynatable-column="lpa_user">PATERNO</th>
                <th data-dynatable-column="lma_user">MATERNO</th>
                <th data-dynatable-column="add_user">DIRECCION</th>
                <th data-dynatable-column="pho_user">TELEFONO</th>
                <th data-dynatable-column="button">Hora de llegada</th>
                <th data-dynatable-column="button2">Descuentos/adelantos</th>
                <th data-dynatable-column="button3">Boleta de pago</th>

              </tr>
            </thead>
            <tbody>
              <tr>
              </tr>
            </tbody>
          </table>
        </div>
      </fieldset>
    </div>
  </div>

  <!-- Modal !-->

    <div class="modal fade" id="miModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title">Registro de usuario</h4>
        </div>
        <div class="modal-body">
  				{!! Form::open(['route' => 'admuser.store']) !!}
          {{csrf_field()}}
          <div class="form-group">
            <label name="nom_adm" for="nom_clie" class="col-lg-4 control-label">Nombre: </label>
            <div class="col-lg-8">
              <input type="text" class="form-control" id="nom_clie" name="nam_user"
                     placeholder="Nombre de usuario">
            </div>
          </div>
          <div class="form-group">
            <label name="pat_adm" for="pat_cli" class="col-lg-4 control-label">Paterno: </label>
            <div class="col-lg-8">
              <input type="text" class="form-control" id="pat_cli"  name="lpa_user"
                     placeholder="Apellido paterno Usuario">
            </div>
          </div>
          <div class="form-group">
            <label name="mat_adm" for="mat_cli" class="col-lg-4 control-label">Materno: </label>
            <div class="col-lg-8">
              <input type="text" class="form-control" id="mat_cli"  name="lma_user"
                     placeholder="Apellido materno usuario">
            </div>
          </div>
          <div class="form-group">
            <label name="mat_adm" for="mat_cli" class="col-lg-4 control-label">C.I.: </label>
            <div class="col-lg-8">
              <input type="text" class="form-control" id="mat_cli"  name="ci_user"
                     placeholder="Cedula de identidad">
            </div>
          </div>
          <div class="form-group">
            <label name="mat_adm" for="mat_cli" class="col-lg-4 control-label">Direccion: </label>
            <div class="col-lg-8">
              <input type="text" class="form-control" id="mat_cli"  name="add_user"
                     placeholder="Direccion del usuario">
            </div>
          </div>
          <div class="form-group">
            <label name="mat_adm" for="mat_cli" class="col-lg-4 control-label">Telefono: </label>
            <div class="col-lg-8">
              <input type="text" class="form-control" id="mat_cli"  name="pho_user"
                     placeholder="Telefono del usuario">
            </div>
          </div>
          <div class="form-group">
            <label name="mat_adm" for="mat_cli" class="col-lg-4 control-label">Nombre de usuario: </label>
            <div class="col-lg-8">
              <input type="text" class="form-control" id="mat_cli"  name="nic_user"
                     placeholder="Nombre de usuario">
            </div>
          </div>
          <div class="form-group">
            <label name="mat_adm" for="mat_cli" class="col-lg-4 control-label">Password: </label>
            <div class="col-lg-8">
              <input type="password" class="form-control" id="mat_cli"  name="password"
                     placeholder="Contraseña">
            </div>
          </div>
          <div class="form-group">
            <label name="mat_adm" for="mat_cli" class="col-lg-4 control-label">Nivel: </label>
            <div class="col-lg-8">
              <select class="form-control" name="niv_user" required>
                <option value="">SELECCIONE</option>
                <option value="0">ADMINISTRADOR</option>
                <option value="1">USUARIO</option>
              </select>
            </div>
          </div>
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
  <!-- Modal !-->

    <div class="modal fade" id="miModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title">Registro de horas de llegada</h4>
        </div>
        <div class="modal-body">
          <fieldset>
            <legend>Usuario - <span id="nombre"></span></legend>
            <div class="row form-group" id="resultado">

            </div>
          </fieldset>
        </div>
       <div class="modal-footer">
          <button type="button" class="btn btn-success" data-dismiss="modal"><i class="material-icons">close</i>Ok</button>
        </div>
      </div>
  		{!! Form::close() !!}
    </div>
  </div>

  </div>
  <!-- Modal !-->
  <!-- Modal !-->

    <div class="modal fade" id="miModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <form class="" action="{{route('discount.store')}}" method="post">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title">Registro de descuentos/adelantos</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <input type="hidden" id="idemp" name="id" value="">
            <label for="">Concepto</label>
            <div class="form-group">
              <select class="form-control" name="tipo" required>
                <option value="">SELECCIONE</option>
                <option value="Descuentos">DESCUENTO</option>
                <option value="Adelantos">ADELANTO</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="">Monto</label>
            <div class="form-group">
              <input type="number" step="0.01" name="monto" class="form-control" value="">
            </div>
          </div>
          <div class="form-group">
            <label for="">Descripcion</label>
            <div class="form-group">
              <textarea name="desc" rows="8" cols="80" class="form-control"></textarea>
            </div>
          </div>
        </div>
       <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="material-icons">close</i>Cancelar</button>
          <button type="submit" class="btn btn-primary"><i class="material-icons">check</i>Registrar</button>
        </div>
      </form>
      </div>
    </div>
  </div>

  </div>
  <!-- Modal !-->
@endsection
@section('scripts')
  <script type="text/javascript">
    $(document).on('ready', function(){
      var users ={!! json_encode($users->toArray()) !!};
      for (var i = 0; i < users.length; i++) {
        users[i].button='<a class="btn btn-raised btn-success" onclick="llegada('+"'"+users[i].id+"','"+users[i].nam_user+"','"+users[i].lpa_user+"','"+users[i].lma_user+"'"+')" data-toggle="modal" data-target="#miModal2"><i class="material-icons" title="Hora de llegada">alarm_on</i></a>';
        users[i].button2='<a onclick="pasarid('+"'"+users[i].id+"'"+')" class="btn btn-raised btn-danger" data-toggle="modal" data-target="#miModal3"><i class="material-icons">remove_circle_outline</i></a>';
        users[i].button3='<a target="_blank" href="employees/pdf/'+users[i].id+'" class="btn btn-raised btn-info" ><i class="material-icons" title="Imprimir boleta de pago">print</i></a>';
      }
      $('#users').dynatable({
        dataset: {
          records:users
        },
        inputs: {
         processingText: 'Loading <img src="{{ url('imagen/cargando.gif')}}" />'
        }
      });
    });
  </script>

  <script type="text/javascript">
    function llegada(var1, nom, lpa,lma){
      document.getElementById('nombre').innerHTML =nom+' '+lpa+' '+lma;
      var parametros = {
                "id" : var1
        };
      $.ajax({
                data:  parametros,
                url:   'getTime',
                type:  'post',
                beforeSend: function () {
                        document.getElementById('resultado').innerHTML='<center><img src="{{url('imagen/cargando.gif')}}" alt="cargando" /><br />Cargando .....</center>'
                },
                success:  function (data) {

                    var dhtml="<table class='table table-hover'><thead><tr><td>Fecha</td><td>Hora</td><tr></thead>";
                        for (datas in data.datos) {
                          var date =new Date(data.datos[datas].time.replace(/-/g,"/"));
                          var time = new Date(data.datos[datas].time);
                          var dd = new String(date.getDate());
                          var mm = new String(date.getMonth()+1); //date es 0!
                          var yyyy = new String(date.getFullYear());
                          var hh= new String(time.getHours());
                          var ii= new String(time.getMinutes());
                          var ss= new String(time.getSeconds());
                          if(hh.length ==1){
                            hh='0'+hh;
                          }if(ii.length ==1){
                            ii='0'+ii;
                          }if(ss.length==1){
                            ss='0'+ss;
                          }
                          time=hh+':'+ii+':'+ss;
                          if(dd.length==1){
                            dd=  '0'+dd;
                          }if(mm.lenght==1){
                            mm=  '0'+mm;
                          }
                          date=  dd+'/'+mm+'/'+yyyy;
                          dhtml+='<tr><td>'+date+'</td><td>'+time+'</td></tr>';
                        };
                    dhtml+='</table>';
                    $("#resultado").html(dhtml);
                }
        });
    }
  </script>
  <script type="text/javascript">
    function pasarid(var1){
      $('#idemp').val(var1);
    }
  </script>
@endsection
