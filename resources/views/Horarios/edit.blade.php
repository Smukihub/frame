@extends('layout.general')

 <script src="/bootstrap-4.5.3-dist/js/jquery-3.5.1.min.js"></script>
  <script src="/bootstrap-4.5.3-dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">


@section('content')
@if (session('error'))
<div>
    {{ session('error') }}
</div>
<br>
@endif
<form action="/Horarios/{{$horario->id}}" method="post" enctype="multipart/form-data" >
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="dia">Dia:</label>
        <input id="dia" type="text" name="dia" class="form-control" value="{{$horario->dia}}">
    </div>


    <div class="form-group">
        <label for="hora">Hora:</label>
        <input id="hora" type="text" name="hora" class="form-control" value="{{$horario->hora}}">
    </div>
    
    
    
    <input type="submit" class="btn btn-primary" value="Enviar">   



</form>
@endsection