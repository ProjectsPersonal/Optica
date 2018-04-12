@extends('../layout')

@section('title')
 Ventas - Optica Ramirez
@endsection
@section('css')
  {!! Html::style('css/sold.css')!!}
@endsection
@section('content')
<div class="row container-fluid row1">
<a href="{{route('sold.smaller')}}">
<div class="well col-md-5 minsold" style="background-color:#DB6504">
<div class="text">Ventas menores</div>
</div>
</a>
<a href="{{route('arrangement.index')}}">
<div class="well col-md-5 arraysold" style="background-color:#001F5C">
<div class="text">Arreglos</div>
</div>
</a>
</div>

@endsection
