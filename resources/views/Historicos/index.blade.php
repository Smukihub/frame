@extends('layouts.app')

 <script src="/bootstrap-4.5.3-dist/js/jquery-3.5.1.min.js"></script>
  <script src="/bootstrap-4.5.3-dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

@section('content')<header>
    <div class="text-center">
      <h1>
       Historico de asistencias y datos
      </h1>
    </div>
  
  </header>
  <div class="container  col-md-8">
    <table class="table table-hover"   >
      <thead>
        
        <th scope="col">Dia</th>
        <th scope="col">tipo</th>
        <th scope="col">acciones</th>
      </thead>
      <tbody>
        @forelse ($historicos as $historicos)
        <tr>
            
            <td>{{ $historicos->dia }}</td>
            <td>{{ $historicos->descripcion }}</td>
            <td>botones</td>
         
        </tr>
    @empty
        <tr>
            <td colspan="3">Sin  registros</td>
        </tr>
    @endforelse
       
      </tbody>
    </table>
  
  </div>

@endsection