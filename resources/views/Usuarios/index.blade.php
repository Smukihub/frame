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
    <li class="breadcrumb-item active" aria-current="page">Usuarios</li>
  </ol>
</nav>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                
                <a href="Usuarios/create" class="btn btn-primary form-control" >Agregar Usuario</a>
                <div class="card-body">
                    
<table  class="table table-striped">
    <thead class="thead-dark">
            <th>Nombre</th>
            <th>Tipo</th>
            <th>Acciones</th>
    </thead>
    <tbody class="thead-light">
        @forelse ($usuarios as $usuario)
            <tr id="{{$usuario->id}}">
                <td>{{$usuario->nombre}} {{$usuario->apellido_paterno}} {{$usuario->apellido_paterno}}</td>
                <td class="tipo" data-original="{{$usuario->rol}}">{{$usuario->rol}}</td>
                <td>
                    <a href="/Usuarios/{{$usuario->id}}/edit" class="btn btn-success">Editar</a>
                    <a href="/Usuarios/{{$usuario->id}}" class="btn btn-warning">Mostrar</a>
                    <form action="/Usuarios/{{$usuario->id}}" method="post" style="display: inline;"  onsubmit="return confirm('Desea eliminar');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>    
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="3">Sin usuarios registrados</td>
            </tr>
        @endforelse
    </tbody> 
    </table>
                </div>
            </div>
        </div>
    </div>
  </div>
@endsection