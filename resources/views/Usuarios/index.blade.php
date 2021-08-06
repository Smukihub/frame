@extends('layouts.app')


@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/">Inicio</a></li>
    <li class="breadcrumb-item active" aria-current="page">Usuarios</li>
  </ol>
</nav>

<div class="container">

    <div class="row justify-content-center">
  
        <div class="col-md-10">
            
           
            <div class="card-body">
                <h4>Click para generar PDF  <a style="color:#e7650f" href="{{ route('users.pdf')}}"><i class="fas fa-file-download"></i></a>
                </h4>
             
            <table  class="table table-bordered">
                <thead class="thead-dark">
                    <a href="Usuarios/create"  class="btn btn-primary form-control" >Agregar Usuario</a>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Imagen</th>
                    <th scope="col">Acciones</th>
                </thead>
                <tbody class="thead-light">
                    @forelse ($usuarios as $usuario)
                        <tr id="{{$usuario->id}}">
                            <td>{{$usuario->nombre}} {{$usuario->apellido_paterno}} {{$usuario->apellido_paterno}}</td>
                            
                            <td  data-original="{{$usuario->apellido}}">{{$usuario->apellido}}</td>
                            <td  data-original="{{$usuario->rol}}">{{$usuario->rol}}</td>
                            <td><img src="/images/{{$usuario->path}}" alt="" style="width: 80px;height: 80px; padding: 10px; margin: 0px; " class="img-thumnail"></td>
                        
                            <td>
                                <a href="/Usuarios/{{$usuario->id}}" class="btn btn-warning">Mostrar</a>
                                <a href="/Usuarios/{{$usuario->id}}/edit" class="btn btn-success">Editar</a>
                                <a href="usuario-pdf/{{$usuario->id}}" class="btn btn-primary">PDF</a>
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
                {{ $usuarios->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection