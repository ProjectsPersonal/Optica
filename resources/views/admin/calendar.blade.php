@extends('../layout')
@section('title')
  Calendario de eventos / Deberes - Optica Ramirez
@endsection
@section('css')
  {!! Html::style('bower_components/fullcalendar/dist/fullcalendar.css')!!}
  <link href='{{ url('bower_components/fullcalendar/dist/fullcalendar.print.css') }}' rel='stylesheet' media='print' />
  <style>
  	#calendar {
  		max-width: 900px;
  		margin: 0 auto;
  	}
  </style>
@endsection
@section('content')
<div class="container-fluid">
  <div class="well">
    <fieldset>
    <legend>Recordatorio y organizador de tareas</legend>
    <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-raised btn-danger" style="padding-left:15px;padding-right:15px;"><i class="material-icons">alarm_on</i> Crear nueva tarea/recordatorio</button> <br><br><br>
      <div id="calendar">

      </div>
  </div>
</fieldset>
</div>
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Recordatorio</h4>
      </div>
      <div class="modal-body">
      <form class="form-horizontal" action="{{route ('calendar.store')}}" method="post">
        {{ csrf_field() }}
        <div class="form-group">
          <label class="col-lg-3">Titulo</label>
          <div class="col-lg-9">
            <input type="text" class="form-control" name="title">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3">Descripcion</label>
          <div class="col-lg-9">
            <textarea  class="form-control" name="body"></textarea>
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3">Fecha de inicio</label>
          <div class="col-lg-9">
            <input type="date" class="form-control" name="fec_ini">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3">Fecha final</label>
          <div class="col-lg-9">
            <input type="date" class="form-control" name="fec_end">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3">Hora de inicio</label>
          <div class="col-lg-9">
            <input type="time" class="form-control" name="hor_ini">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3">Hora final</label>
          <div class="col-lg-9">
            <input type="time" class="form-control" name="hor_end">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3">Label</label>
          <div class="col-lg-9">
            <input type="color" class="form-control" name="color">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success" >Guardar</button>
      </div>
    </form>
    </div>

  </div>
</div>
@endsection
@section('scripts')

  {{ Html::script('bower_components/fullcalendar/dist/locale-all.js') }}
  {{ Html::script('js/theme-chooser.js') }}
  <script>
  var array= {!! json_encode($events->toArray()) !!}
  	$(document).ready(function() {
      initThemeChooser({
      init: function(themeSystem) {
  		$('#calendar').fullCalendar({
  			header: {
  				left: 'prev,next today',
  				center: 'title',
  				right: 'month,agendaWeek,agendaDay,listWeek'
  			},
        defaultDate: '2017-09-12',
        locale: 'es',
  			navLinks: true, // can click day/week names to navigate views
  			editable: true,
  			eventLimit: true, // allow "more" link when too many events
        defaultView : "month",
  			events: array
  		});
  	},
    change: function(themeSystem) {
      $('#calendar').fullCalendar('option', 'themeSystem', themeSystem);
    }
  });
});

  </script>
@endsection
