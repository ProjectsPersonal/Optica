@extends('../layout')
@section('title')
  Menu administrador - Acceso
@endsection

@section('css')
  {!! Html::style('css/admin.css')!!}
@endsection
@section('content')
<div class="row container-fluid row1">
<a href="{{route('admin.employees')}}">
<div class="well pan1 col-lg-4" style="background-color: #5C0003;">
  <div class="text"> Personal
  </div>
</div></a>
<a href="{{ route('admin.debts')}}">
<div class="well pan2 col-lg-3" style="background-color: #00425C;">
  <div class="text"> Control de deudas
  </div>
</div></a>
<a href="{{ route('admin.calendar')}}">
<div class="well pan3 col-lg-4" style="background-color: #5C2000;">
  <div class="text"> Calendario
  </div>
</div></a>
</div>
<div class="row container-fluid row1">
  <a href="{{ route('admin.diary')}}">
  <div class="well pan4 col-lg-4" style="background-color: #555C00;">
    <div class="text">Boletas/Libro diario
    </div>
  </div></a>
  <a href="{{ route('admin.expenses')}}">
  <div class="well pan5 col-lg-3" style="background-color: #00195C;">
    <div class="text"> Control de gastos
    </div>
  </div></a>
  <a href="{{route('admin.admin')}}">
  <div class="well pan6 col-lg-4" style="background-color: #5C0003;">
    <div class="text"> Administrador
    </div>
  </div></a>
  </div>
  <div class="row container-fluid row1">
    <a href="{{route('sold.report')}}">
    <div class="well col-md-4 repsold" style="background-color:#5C004D">
  <div class="text">Reportes</div>
    </div>
  </a>
  <a href="{{route('sold.graphic')}}">
    <div class="well col-md-3 aresold" style="background-color:#5C1200">
  <div class="text">Graficos estadisticos</div>
    </div>
  </a>
  <a href="{{route('sold.inventory')}}">
    <div class="well col-md-4 invsold" style="background-color:#005C54">
      <div class="text">Inventario general</div>
    </div>
  </a>
  </div>
@endsection
