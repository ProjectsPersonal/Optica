@extends('../layout')
@section('title')
  Ventas menores - Optica Ramirez
@endsection
@section('content')
<style media="screen">
  .cont{
    border: solid 0.5px #888; outline: none; padding:5px; border-radius:2px;line-height: 16px;
  }
  .cont2{
    border: solid  #fff; outline: none; padding:5px; border-radius:2px;line-height: 16px; background-color: rgba(193, 52, 171, 0.53); color:#eee;font-size: 16px;
  }
  .cont3{
    border: solid  #fff; outline: none; padding:5px; border-radius:2px;line-height: 16px; font-size: 20px;
  }
  .cont:hover{
    border: solid 0.5px rgb(11, 127, 191);
  }
  .caja:focus {box-shadow: 0 0 5px rgba(0, 148, 255, 1);border:1px solid rgba(0, 148, 255, 1);}
</style>
<div class="container-fluid">
  <div class="well">
    <fieldset>
    <legend>Ventas menores - Registro</legend>
    <button type="button" class="btn btn-danger btn-raised" data-toggle="modal" data-target="#miModal" name="button"><i class="material-icons"></i> Registrar venta</button><br><br>
    <table class="table table-striped table-hover" id="sales">
      <thead>
        <tr>
          <th data-dynatable-column="fec_sale">Fecha de venta</th>
          <th data-dynatable-column="nam_sale">Cliente</th>
          <th data-dynatable-column="nam_user">Usuario</th>
          <th data-dynatable-column="button">Acciones</th>
        </tr>
      </thead>
    </table>
  </fieldset>
  </div>
</div>
<!-- Modal -->
<div id="detail" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Detalles de venta</h4>
      </div>
      <div class="modal-body">
        <div class="form-group has-danger">
          <label class="col-md-4 control-label">Fecha de venta:</label>
        <div class="col-md-8" >
          <input type="date" value="" name="fec_sale" id="fec_sale" class="form-control" readonly="readonly" >
        </div>
        </div>
        <div class="form-group has-danger">
          <label class="col-md-4 control-label">Nombre cliente:</label>
        <div class="col-md-8" >
          <input type="text" value="" name="nam_sale" id="nam_sale" class="form-control" readonly="readonly" >
        </div>
        </div>
        <div class="form-group has-danger">
          <label class="col-md-4 control-label">Registrado por:</label>
        <div class="col-md-8" >
          <input type="text" value="" name="id_user" id="id_user" class="form-control" readonly="readonly" >
        </div>
        </div>
        <div id="resultado">

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="material-icons">close</i>Cerrar</button>
      </div>
    </div>

  </div>
</div>
<!-- Modal !-->

  <div class="modal fade" id="miModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">Registrar venta</h4>
      </div>
      <div class="modal-body">
				{!! Form::open(['route' => 'sales.store']) !!}
        <div class="form-group has-danger">
          <label class="col-md-4 control-label">Fecha:</label>
        <div class="col-md-8" >
          <input type="date" value="{{\Carbon\Carbon::now()->format('Y-m-d')}}" name="fec_sale" class="form-control" required>
        </div>
      </div>
      <div class="form-group has-danger">
        <label class="col-md-4 control-label">Nombre:</label>
      <div class="col-md-8" >
        <input type="text" value="" name="nam_sale" class="form-control" required placeholder="Nombre del cliente">
      </div>
    </div>
        <div class="form-group has-danger">
          <div class="col-md-12" >

            <div class="back-to-top pull-right">
              <button type="button" class="btn btn-raised btn-success" onclick="crear(this)" >Agregar producto</button>
            </div>
            <div class="clearfix">
            </div>
            <div class="table-responsive">

          <table class="table table-hover" id="">
            <thead>
              <td width="10%">Producto</td>
              <td width="20%">Precio</td>
              <td width="20%">Cantidad</td>
              <td width="20%">Total</td>
              <td width="20%"></td>
            </thead>
            <tbody id="fiel">

            </tbody>
          </table>
        </div>
          <input type="hidden" name="num" id="num" value="0">
          <div class="form-group has-danger pull-right" style="color:#fff;">
          <label for="" class="label label-danger" style="color:#fff;">Total de venta: </label>
          <input type="number" name="" id="total_total" readonly class="cont3 label-warning" value="0">
          </div>
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
@endsection
@section('scripts')
  <script type="text/javascript">

  $(document).on('ready', function(){
    var sale ={!! json_encode($sale->toArray()) !!};
    console.log(sale);
    for(var i=0; i<sale.length; i++)
    {
      var id=sale[i].id;
      var fecsale=sale[i].fec_sale;
      var namsale=sale[i].nam_sale;
      var iduser=sale[i].nam_user+' '+sale[i].lpa_user+' '+sale[i].lma_user;

      var b="'"+id+"','"+fecsale+"','"+namsale+"','"+iduser+"'";


      var click="javascript:pasar('"+ sale[i].nam_cli+"','"+ sale[i].lpa_cli+"','"+sale[i].lma_cli +"','"+sale[i].add_cli +"','"+sale[i].pho_cli +"','"+sale[i].id+"','"+sale[i].old_cli +"');";
      sale[i].button='<a class="btn btn-raised btn-warning" onclick="javascript:pasadatos('+b+');" data-toggle="modal" data-target="#detail"  style="margin-top:0px; padding: 8px;"><i class="material-icons">supervisor_account</i> Ver detalles</a>';
      JSON.stringify(sale);
      console.log(sale);
    }
    console.log(sale);
    $('#sales').dynatable({
      dataset: {
        records: sale
      },
      inputs: {
       processingText: 'Loading <img src="{{ url('imagen/cargando.gif')}}" />'
      }
    });
  });
  function pasadatos(id,fecsale,namsale,iduser){
    $('#id').val(id);
    $('#fec_sale').val(fecsale);
    $('#nam_sale').val(namsale);
    $('#id_user').val(iduser);
    var parametros = {
              "id" : id
      };
    $.ajax({
              data:  parametros,
              url:   'getProducts',
              type:  'post',
              beforeSend: function () {
                      document.getElementById('resultado').innerHTML='<center><img src="{{url('imagen/cargando.gif')}}" alt="cargando" /><br />Cargando .....</center>'
              },
              success:  function (data) {
                  console.log(data);
                  var dhtml="<table class='table table-hover'><thead><tr><td>Producto</td><td>Precio</td><td>Cantidad</td><tr></thead>";
                      for (datas in data.datos) {

                        dhtml+='<tr><td>'+datas.des_pro+'</td><td>'+data.datos[des_pro]+'</td><td>'+data.datos[des_pro]+'</td></tr>';
                      };
                  dhtml+='</table>';
                  $("#resultado").html(dhtml);
              }
      });
  }
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
  <script type="text/javascript">
  <!--
  var num=0;

  function crear(obj) {
    num++;
    fi = document.getElementById('fiel'); // 1
    contenedor = document.createElement('tr'); // 2
    contenedor.id = 'div'+num; // 3
    contenedor.class = 'form-group';
    fi.appendChild(contenedor); // 4

    td= document.createElement('td');
    td.setAttribute("width", "50%");
    ele = document.createElement('input'); // 5
    ele.setAttribute("class", "caja2"+num+' cont'); // 6
    ele.setAttribute("required", "yes");
    ele.type = 'text'; // 6
    ele.name = 'pro'+num; // 6
    td.appendChild(ele); // 7
    contenedor.appendChild(td);

    td2= document.createElement('td');
    td2.setAttribute("width", "10%");
    ele = document.createElement('input'); // 5
    ele.setAttribute("class",'cont');
    ele.setAttribute("required", "yes");
    ele.setAttribute("step", "0.01");
    ele.setAttribute("min", "0");
    ele.type = 'number'; // 6
    ele.id = 'cajamuno'+num;
    ele.name = 'pre'+num; // 6
    ele.setAttribute("onkeyup", "multiplicar();");
    ele.class='cont';
    td2.appendChild(ele); // 7
    contenedor.appendChild(td2);

    td3= document.createElement('td');
    td3.setAttribute("width", "10%");
    ele = document.createElement('input'); // 5
    ele.setAttribute("class",'cont');
    ele.setAttribute("required", "yes");
    ele.setAttribute("min", "0");
    ele.type = 'number'; // 6
    ele.name = 'fil'+num; // 6
    ele.id = 'cajamdos'+num;
    ele.setAttribute("onkeyup", "multiplicar();");
    ele.class='cont';
    td3.appendChild(ele); // 7
    contenedor.appendChild(td3);

    td4= document.createElement('td');
    td4.setAttribute("width", "10%");
    ele = document.createElement('input'); // 5
    ele.setAttribute("class",'cont2');
    ele.type = 'number'; // 6
    ele.setAttribute("readonly", "readonly");
    ele.setAttribute("onChange", "suma();");
    ele.name = 'tot'+num; // 6
    ele.id = 'tot'+num; // 6
    ele.value='0';
    ele.setAttribute("class", "total_t cont2"); // 6
    td4.appendChild(ele); // 7
    contenedor.appendChild(td4);

  var add2=0;



  $('#num').val(num);
    td5= document.createElement('td');
    td5.setAttribute("width", "20%");
    ele = document.createElement('input'); // 5
    ele.type = 'button'; // 6
    ele.value = '-'; // 8
    ele.setAttribute("class", "btn btn-danger btn-raised"); // 6
    ele.name = 'div'+num; // 8
    ele.onclick = function () {borrar(this.name)} // 9
    td5.appendChild(ele);
    contenedor.appendChild(td5); // 7



  }

function multiplicar(){
  var total = 0;
  var valor1 = document.getElementById("cajamuno"+num).value;
  var valor2 = document.getElementById("cajamdos"+num).value;
  total = (valor1 * valor2);
  //var Display = document.getElementById("tot"+num).value;

  $('#tot'+num).val(total);
  var add=0;
    for (var i = 1; i <= num; i++) {
      var valor1 = document.getElementById("cajamuno"+i).value;
      var valor2 = document.getElementById("cajamdos"+i).value;
      total = (valor1 * valor2);
      var add=add+total;
    }
    $('#total_total').val(add);
  console.log(add);
  console.log(total);
}




function borrar(obj) {
  num--;
  fi = document.getElementById('fiel'); // 1
  fi.removeChild(document.getElementById(obj)); // 10
  $('#num').val(num);

}
-->
</script>
@endsection
