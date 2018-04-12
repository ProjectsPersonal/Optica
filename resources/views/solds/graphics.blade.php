@extends('../layout')
@section('title')
  Generador de graficos - Optica Ramirez
@endsection
@section('css')

@endsection
@section('content')
  <div class="container">

      <div class="jumbotron">
      <div class="panel panel-warning">
    <div class="panel-heading">
      <h3>DATOS ESTADISTICOS</h3>
    </div>
      </div>
          <div class="form-group">


  <form class="form-horizontal" role="form">
    <div class="form-group">
      <div class="col-lg-7">
        <!--inicio DE contenido izquierda-->
            <!--INICIO DE HIGHCHARTS-->
                  <head>
                    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
                    <title>Highcharts Example</title>


                      <style type="text/css">
                  ${demo.css}
                      </style>

                 </head>
                  <body>



                    <div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>

                  </body>
                  <!--FIN DE HIGHCHARTS-->

        <!--fin DE contenido izquierda-->

      </div>
      <div class="col-lg-5">
       <!--inicio DE contenido derecha-->


  <a  href="javascript:void(0)" class="btn btn-raised btn-info" style="width: 200px; height: 100px; background-color: #FA2E05;">
  <span class="glyphicon glyphicon-time" style="font-size: 50px;"></span> <br>DIARIO</a>
  <a  href="javascript:void(0)" class="btn btn-raised btn-info" style="width: 200px; height: 100px; background-color: #FA7C05;">
  <span class="glyphicon glyphicon-tasks" style="font-size: 50px;"></span> <br>ENTRE FECHAS</a>
  <a  href="javascript:void(0)" class="btn btn-raised btn-info" style="width: 200px; height: 100px; background-color: #900C3F ;">
  <span class="glyphicon glyphicon-calendar" style="font-size: 50px;"></span> <br>MENSUAL</a>
  <a  href="javascript:void(0)" class="btn btn-raised btn-info" style="width: 200px; height: 100px; background-color: #FFC300;">
  <span class="glyphicon glyphicon-globe" style="font-size: 50px;"></span> <br>ANUAL</a>


        <!--fin DE contenido derecha-->

      </div>
    </div>
    <div class="form-group">

    </div>
  </form>

          </div>
          </div>
      </div>
  </div>




  <!--FIN DEL CONTENIDO-->

@endsection
@section('scripts')
  {!! Html::script('Highcharts/js/highcharts.js')!!}
  {!! Html::script('Highcharts/js/modules/exporting.js')!!}
  <script type="text/javascript">
 $(function () {
     $('#container').highcharts({
         chart: {
             plotBackgroundColor: null,
             plotBorderWidth: null,
             plotShadow: false
         },
         title: {
             text: 'DATOS ESTADISTICOS'
         },
         tooltip: {
             pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
         },
         plotOptions: {
             pie: {
                 allowPointSelect: true,
                 cursor: 'pointer',
                 dataLabels: {
                     enabled: true,
                     format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                     style: {
                         color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                     }
                 }
             }
         },
         series: [{
             type: 'pie',
             name: 'Porcentaje',
             data: [


                 ['dato1',   50],
                  ['dato2',  40],
                  ['dato3',   5]


             ]
         }]
     });
 });


     </script>
@endsection
