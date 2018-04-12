@extends('../layout')
@section('title')
  Clientes registrados - Optica Ramirez
@endsection
@section('css')

@endsection
@section('content')
  <div class="container-fluid">
  	<div class="col-md-12 well form">
  		<fieldset>
  			<legend>Lista de clientes - Generar recetas</legend>
  			<div class="table-responsive">
  			<table class="table table-striped table-hover" id="client">
    <thead>
      <tr>
        <th data-dynatable-column="nam_cli">Nombre</th>
        <th data-dynatable-column="lpa_cli">Paterno</th>
        <th data-dynatable-column="lma_cli">Materno</th>
        <th data-dynatable-column="pho_cli">Telefono</th>
        <th data-dynatable-column="button">Acciones</th>
      </tr>
    </thead>
    <tbody>

  	</tr>
    </tbody>
  </table>
  </div>
  		</fieldset>
  	</div>
@endsection
@section('scripts')
  <script type="text/javascript">
    $(document).on('ready', function(){
      var clients ={!! json_encode($clients->toArray()) !!};
      console.log(clients);
      for(var i=0; i<clients.length; i++)
      {

        var route='{{url('/')}}'+'/recipe/set/'+clients[i].id;
        var click="javascript:pasar('"+ clients[i].nam_cli+"','"+ clients[i].lpa_cli+"','"+clients[i].lma_cli +"','"+clients[i].add_cli +"','"+clients[i].pho_cli +"','"+clients[i].id+"','"+clients[i].old_cli +"');";
        clients[i].button='<a class="btn btn-raised btn-danger"  onclick="'+click+'" href="'+route+'" style="margin-top:0px; padding: 8px;"><i class="material-icons">note</i></a>';
        JSON.stringify(clients);
        console.log(clients);
      }
      console.log(clients);
      $('#client').dynatable({
        dataset: {
          records: clients
        },
        inputs: {
         processingText: 'Loading <img src="{{ url('imagen/cargando.gif')}}" />'
        }
      });
    });
    function pasar(nam,lpa,lma,add,pho,id,old)
    {
      document.getElementById("nam").innerHTML = nam+' '+lpa+' '+lma;
      document.getElementById("old").innerHTML = old;
      document.getElementById("add").innerHTML = add;
      document.getElementById("pho").innerHTML = pho;
      $('#cli').val(id);
      $('#cli2').val(id);
    }
  </script>
@endsection
