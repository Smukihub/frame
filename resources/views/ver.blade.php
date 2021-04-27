@extends('layouts.app')

<script src="/bootstrap-4.5.3-dist/js/jquery-3.5.1.min.js"></script>
<script src="/bootstrap-4.5.3-dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">



@section('content')


<div class="py-4 bg-light" >
    <div class="container">
      <div class="row">
          <h1>{{$mensaje}}</h1>
      </div>
      <div class="row">
      @forelse ($horarios as $horario)
        <div class="col-md-4 p-3">
          <div class="card box-shadow">
        
            <div class="card-body">
              <p class="card-text">
                <p>{{$horario->dia}}</p>
                <p>{{$horario->hora}}</p>
  
             
  
            </div>
          </div>
        </div>
      @empty
        No hay Horario para mostrar.
      @endforelse
    </div>
    </div>
  </div>

@endsection