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
    <li class="breadcrumb-item active" aria-current="page">Proyectos</li>
  </ol>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                
                    <a href="Proyectos/create" class="btn btn-primary">Agregar proyecto</a>
                </div>                  
                <div class="card-body">                                           
                        <table  class="table table-striped">
                            <thead class="thead-dark">
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Descripción</th>
                                    <th scope="col">Accion</th>
                                    
                            </thead>
                            <tbody class="thead-light">
                                @forelse ($proyectos as $proyectos)
                                    <tr> @if($proyectos->nombre)
                                    
                                    @endif
                                    
                                        <td>{{ $proyectos->nombre }}</td>
                                        <td>{{ $proyectos->d_actividades }}</td>
                                        
                                    
                                    
                                        
                                        <td>
                                            <a href="/Proyectos/{{$proyectos->id}}/edit" class="btn btn-success">Editar</a>
                                            <a href="/Proyectos/{{$proyectos->id}}" class="btn btn-warning">Mostrar</a>
                                            <a href="/ver-horario/{{$proyectos->id}}" class="btn btn-primary">Horario</a> 
                                            <a href="/seguimientos/{{$proyectos->id}}"  class="btn btn-primary">Historico</a> 
                                            <a href="/nuevo-seguimiento/{{$proyectos->id}}"  class="btn btn-primary">Seguimiento</a> 
                                             
                                            <form action="/Proyectos/{{$proyectos->id}}" method="post" style="display: inline;"  onsubmit="return confirm('Desea eliminar');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Eliminar</button>
                                            </form>    
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3">Sin proyectos registrados</td>
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