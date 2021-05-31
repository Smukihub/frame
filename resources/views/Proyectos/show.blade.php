@extends('layouts.app')

 <script src="/bootstrap-4.5.3-dist/js/jquery-3.5.1.min.js"></script>
  <script src="/bootstrap-4.5.3-dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <script src="/bootstrap-4.5.3-dist/js/jquery-3.5.1.min.js"></script>
  <script src="/bootstrap-4.5.3-dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/">Inicio</a></li>
    <li class="breadcrumb-item"><a href="/tablero">Tablero</a></li>
    <li class="breadcrumb-item"><a href="/Proyectos">Proyectos</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{$proyecto->nombre}} - Mostrar</li>
  </ol>
</nav>
<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-8">
          <div class="card">
              <div class="card-header">{{ __('Proyecto - Mostrar') }}
                
              </div>                  
              <div class="card-body">
                <table class="table table-bordered">
                  <thead class="thead-dark">
                    <tr>
                      
                      <th scope="col">Nombre</th>
                      <th scope="col">Descripcion</th>
                
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                     
                      <td>{{$proyecto->nombre}}</td>
                      <td>{{$proyecto->d_actividades}}</td>
                      
                     
                      
                    </tr>
                    
                  </tbody>
                </table>
              </div>
          

          </div>
      </div>
  </div>
</div>


@endsection 
