@extends('layouts.app')

 <script src="/bootstrap-4.5.3-dist/js/jquery-3.5.1.min.js"></script>
  <script src="/bootstrap-4.5.3-dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  
 <script src="/bootstrap-4.5.3-dist/js/jquery-3.5.1.min.js"></script>
  <script src="/bootstrap-4.5.3-dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">


@section('content')
@switch(Auth::user()->rol)
    @case('Jefe')
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Inicio</a></li>
        <li class="breadcrumb-item"><a href="/tablero">Tablero</a></li>
        <li class="breadcrumb-item"><a href="/Proyectos">Proyectos</a></li>
        <li class="breadcrumb-item"><A HREF="javascript:javascript:history.go(-1)">Historicos</A></li>
        <li class="breadcrumb-item active" aria-current="page">Historicos - Mostrar</li>
      </ol>
    </nav>
        @break
    @case('Auxiliar')
    <nav aria-label="breadcrumb">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Inicio</a></li>
          <li class="breadcrumb-item"><a href="/tablero">Tablero</a></li>
          
          <li class="breadcrumb-item"><A HREF="javascript:javascript:history.go(-1)">Historicos</A></li>
          <li class="breadcrumb-item active" aria-current="page">Historicos - Mostrar</li>
        </ol>
      </nav>
        
        @break
    @default
        
@endswitch


<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-12">
          <div class="card">
              <div class="card-header">{{ __('Datos del historico') }}</div>

              <div class="card-body">
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">Fecha</th>
                      <th scope="col">Dia</th>
                      <th scope="col">Hora</th>
                      <th scope="col">Tipo</th>
                      <th scope="col">Detalles</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      
                      <td>{{$historico->fecha}}</td>
                      <td>{{$historico->dia}}</td>
                      <td>{{$historico->horaVisible()}}</td>
                      <td>{{$historico->tipo}}</td>
                      <td>
                                
                          @switch($historico->tipo)
                              @case('Asistencia')
                              
                              {{$historico->actv}}
                                  @break
                              @case('Retardo')

                              {{$historico->horares}}
                                  @break
                              @case('Falta')
                              {{$historico->justi}}
                              
                                  
                          @endswitch
                        
                      </td>
                    </tr>
                  
                  </tbody>
                </table>                 
                 
                



               
                 
                
                  
                 
              </div>
          </div>
      </div>
  </div>
</div>
@endsection 
