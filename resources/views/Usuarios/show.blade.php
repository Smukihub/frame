@extends('layouts.app')



@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/">Inicio</a></li>
    <li class="breadcrumb-item"><a href="/Usuarios">Usuarios</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{$usuario->nombre}}</li>
  </ol>
</nav>
<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-12">
          <div class="card">
              <div class="card-header">Datos - {{$usuario->nombre}}</div>

              <div class="card-body">
                <table class="table table-bordered">
                  <thead class="thead-dark">
                    <tr>
                      
                      <th scope="col">Nombre</th>
                      <th scope="col">Apellido</th>
                      <th scope="col">Teléfono</th>
                      <th scope="col">No. Control</th>
                      <th scope="col">Tipo</th>
                      <th scope="col">Status</th>
                      <th scope="col">Activo</th>
                      <th scope="col">E-mail</th>
                      <th scope="col">Imagen</th>
                
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                     
                      <td>{{$usuario->nombre}}</td>
                      <td>{{$usuario->apellido}}</td>
                      <td>{{$usuario->telefono}}</td>
                      <td>{{$usuario->numcontrol}}</td>
                      <td>{{$usuario->rol}}</td>
                      <td>{{$usuario->status}}</td>
                      <td>{{$usuario->activo}}</td>
                      <td>{{$usuario->email}}</td>
                      <td><img src="/images/{{$usuario->path}}" alt="" style="width: 80px;height: 80px; padding: 10px; margin: 0px; " class="img-thumnail"></td>
                      
                     
                      
                    </tr>
                    
                  </tbody>
                </table>              
                
              </div>
          </div>
      </div>
  </div>
</div>
@endsection 
