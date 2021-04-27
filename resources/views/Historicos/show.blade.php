@extends('layout.general')

 <script src="/bootstrap-4.5.3-dist/js/jquery-3.5.1.min.js"></script>
  <script src="/bootstrap-4.5.3-dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">


@section('content')
<table class="table table-sm">
  <thead>
    <tr>
      
      <th scope="col">ID</th>
      <th scope="col">Dia</th>
      <th scope="col">Hora</th>
      <th scope="col">Proyecto</th>

    </tr>
  </thead>
  <tbody>
    <tr>
     
      <td>{{$horario->id}}</td>
      <td>{{$horario->dia}}</td>
      <td>{{$horario->hora}}</td>
      <td>    
            @foreach($proyectos as $proyecto)
        <option value="{{ $proyecto->id }}"
         @isset($horarios->proyecto[0]->nombre)
           @if($proyecto->nombre == $proyecto->proyecto[0]->nombre)
           selected 
           @endif
         @endisset


         >{{ $proyecto->nombre }}</option>
        @endforeach
      </td>
      
      
     
      
    </tr>
    
  </tbody>
</table>
@endsection 
