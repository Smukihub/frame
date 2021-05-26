@extends('layouts.app')

 <script src="/bootstrap-4.5.3-dist/js/jquery-3.5.1.min.js"></script>
  <script src="/bootstrap-4.5.3-dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">


@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/">Inicio</a></li>
    <li class="breadcrumb-item"><a href="/tablero">Tablero</a></li>
    <li class="breadcrumb-item"><a href="/Usuarios">Usuarios</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{$usuario->nombre}}</li>
  </ol>
<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-8">
          <div class="card">
              <div class="card-header">{{ __('Datos del usuario') }}</div>

              <div class="card-body">
                                  
                  <div class="row">
                    <div class="col">Nombre del usuario:</div>
                    <div class="col bg-light">{{$usuario->nombre}}</div>
                    <div class="col"></div>
                    <div class="col"></div>
                  </div>
                  <div class="row">
                    <div class="col">Apellido paterno:</div>
                    <div class="col bg-light">{{$usuario->apellido}}</div>
                    <div class="col"></div>
                    <div class="col"></div>
                  </div>


                  <div class="row">
                    <div class="col">Tipo de usuario:</div>
                    <div class="col bg-light">{{$usuario->rol}}</div>
                    <div class="col"></div>
                    <div class="col"></div>
                  </div>
                  <div class="row">
                    <div class="col">Imagen:</div>
                    <div class="col bg-light"><img src="/images/{{$usuario->path}}" alt="" style="width: 80px;height: 80px; padding: 10px; margin: 0px; " class="img-thumnail"></div>
                    <div class="col"></div>
                    <div class="col"></div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection 
