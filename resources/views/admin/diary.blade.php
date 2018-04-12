@extends('../layout')
@section('title')
  Libro diario / Control de boletas - Optica Ramirez
@endsection
@section('css')
@endsection
@section('content')
  <div class="container-fluid">
      <div class="row">
        <div class="well col-md-5">
          <fieldset>
            <legend>Control de boletas - Saldos pendientes</legend>
            <div class="table-responsive">
              <table class="table table-hover" id="tickets">
                <thead>
                  <tr>
                    <th data-dynatable-column="fec_tic">Fecha</th>
                    <th data-dynatable-column="name">Cliente</th>
                    <th data-dynatable-column="sal_tic">Saldo</th>
                    <th data-dynatable-column="button">Cancelar saldo</th>
                </thead>
                <tbody>

                </tbody>
              </table>
            </div>
          </fieldset>
        </div>
        <div class="well col-md-6 col-md-offset-1">
          <fieldset>
            <legend>Libro diario - Optica Ramirez <a href="{{route('pdf.diary')}}" target="_blank" class="btn btn-raised btn-primary"><span class="material-icons">print</span></a></legend>
            <center>
            <h4>  ENTRADAS / {{\Carbon\Carbon::now()->format('d-m-Y')}} </h4>
            </center>
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Concepto</th>
                    <th>Monto</th>
                  </tr>
                </thead>
                <tbody>
                  @php
                    $totalent=0;
                  @endphp
                  @foreach ($tics as $tic)
                    <tr>
                      <td class="info">Boletas - A cuenta</td>
                      <td>Bs. {{$tic->acu_tic}}</td>
                    </tr>
                    @php
                      $totalent+=$tic->acu_tic;
                    @endphp
                  @endforeach
                  @foreach ($solds as $sold)
                    <tr>
                      <td class="primary">Ventas menores</td>
                      <td>Bs. {{$sold->tot_pro}}</td>
                    </tr>
                    @php
                      $totalent+=$sold->tot_pro;
                    @endphp
                  @endforeach
                  @foreach ($cancels as $cancel)
                    <tr>
                      <td class="success">Boletas - Saldos</td>
                      <td>Bs. {{$cancel->mon_can}}</td>
                    </tr>
                    @php
                      $totalent+=$cancel->mon_can;
                    @endphp
                  @endforeach
                </tbody>
              </table>

            <center>
            <h4>  SALIDAS / {{\Carbon\Carbon::now()->format('d-m-Y')}}</h4>
            </center>
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Concepto</th>
                  <th>Monto</th>
                </tr>
              </thead>
              <tbody>
                @php
                  $totalsal=0;
                @endphp
                @foreach ($gastos as $gasto)
                  <tr>
                    <td class="danger">Gastos generales</td>
                    <td>Bs. {{$gasto->mon_exp}}</td>
                  </tr>
                  @php
                    $totalsal+=$gasto->mon_exp;
                  @endphp
                @endforeach
                @foreach ($discs as $disc)
                  <tr>
                    <td class="warning">Adelantos</td>
                    <td>Bs. {{$disc->mon_dis}}</td>
                  </tr>
                  @php
                    $totalsal+=$disc->mon_dis;
                  @endphp
                @endforeach
                @foreach ($debts as $debt)
                  <tr>
                    <td class="default">Prestamos</td>
                    <td>Bs. {{$debt->mon_deb}}</td>
                  </tr>
                  @php
                    $totalsal+=$debt->mon_deb;
                  @endphp
                @endforeach
              </tbody>
            </table>
            <center>
            <h4>  Resumen General</h4>
            </center>
            <table class="table table-hover">
              <thead>
              </thead>
              <tbody>
                <tr>
                  <td class="success"><b>ENTRADAS</b></td>
                  <td>Bs. {{$totalent}}</td>
                </tr>
                <tr>
                  <td class="danger"><b>SALIDAS</b></td>
                  <td>Bs. {{$totalsal}}</td>
                </tr>
                <tr>
                  <td class="warning"><b>TOTAL</b></td>
                  <td>Bs. {{$totalent-$totalsal}}</td>
                </tr>
              </tbody>
            </table>
        </div>
      </div>
  </div>

  <!-- Modal -->
  <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">CANCELAR SALDO</h4>
        </div>
        <form class="" action="{{route('admin.canceled')}}" method="post">
          {{csrf_field()}}
          <input type="hidden" class="form-control" id="idtic" name="idtic" value="">
        <div class="modal-body">
          <p>¿Esta seguro de realizar la cancelacion del saldo?</p>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger">Confirmar</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </form>
    </div>
  </div>
@endsection
@section('scripts')
  <script type="text/javascript">
    $(document).on('ready', function(){
      var tickets ={!! json_encode($tickets->toArray()) !!};
      for (var i = 0; i < tickets.length; i++) {
        tickets[i].name=tickets[i].nam_cli+' '+tickets[i].lpa_cli+' '+tickets[i].lma_cli;
        tickets[i].button='<a class="btn btn-raised btn-danger" onclick="cancelar('+"'"+tickets[i].id+"'"+')" data-toggle="modal" data-target="#myModal" title="Cancelar saldo"><i class="material-icons" >money_off</i></a>';

      }
      $('#tickets').dynatable({
        dataset: {
          records:tickets
        },
        inputs: {
         processingText: 'Loading <img src="{{ url('imagen/cargando.gif')}}" />'
        }
      });
    });

    function cancelar(id){
          $('#idtic').val(id);
        }
  </script>
@endsection
