@extends('layouts.app')


@section('content')
@can('prestador-jefe', Auth::user())
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Inicio</a></li>
        <li class="breadcrumb-item active" aria-current="page">Proyectos</li>
        </ol>

       
    </nav>
  
@endcan
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
          
            
            
                                                     

                <table  class="table table-striped">
                    <thead class="thead-dark">
                        @can('jefe-only', Auth::user())
                        <a href="Proyectos/create" class="btn btn-primary form-control">Agregar proyecto</a>
                        @endcan
                        
                        <th scope="col">Nombre <a href="/Proyectos?oAF=si"><i class="fas fa-angle-up"></i></a> <a href="/Proyectos?oDF=si"><i class="fas fa-angle-down"></i></a> F</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Accion</th>
                        
                    </thead>
                    <tbody class="thead-light">
                        @forelse ($proyectos as $proyecto)
                            <tr> @if($proyecto->nombre)
                            
                            @endif
                            
                                <td>{{ $proyecto->nombre }}</td>
                                <td>{{ $proyecto->d_actividades }}</td>
                                <td>
                                    
                                    <a href="/Proyectos/{{$proyecto->id}}" class="btn btn-warning">Mostrar</a>
                                    <a href="/ver-horario/{{$proyecto->id}}" class="btn btn-secondary">Horario</a> 
                                    <a href="/seguimientos/{{$proyecto->id}}"  class="btn btn-info">Historico</a> 

                                    @can('auxiliar-jefe', Auth::user())
                                    <a href="/nuevo-seguimiento/{{$proyecto->id}}"  class="btn btn-dark">Seguimiento</a> 
                                        
                                    @endcan
                                    
                                    @can('jefe-only', Auth::user())
                                        <a href="/Proyectos/{{$proyecto->id}}/edit" class="btn btn-success">Editar</a>
                                        <form action="/Proyectos/{{$proyecto->id}}" method="post" style="display: inline;"  onsubmit="return confirm('Desea eliminar');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Eliminar</button>
                                        </form>   
                                       
                                    @endcan
                                
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3">Sin proyectos registrados</td>
                            </tr>
                        @endforelse
                    </tbody> 
                </table>     
{{$proyectos->links()}}

{{-- histocios --}}
@can('auxiliar-jefe', Auth::user())
<table  class="table table-striped">
    <thead class="thead-dark">
        <th scope="col">Nombre <a href="/Proyectos?oAF=si"><i class="fas fa-angle-up"></i></a> <a href="/Proyectos?oDF=si"><i class="fas fa-angle-down"></i></a> F</th>
        <th scope="col">Descripción</th>
        <th scope="col">Accion</th>
        
    </thead>
    <tbody class="thead-light">
        @forelse ($historicos as $proyecto)
            <tr> @if($proyecto->nombre)
            
            @endif
            
                <td>{{ $proyecto->nombre }}</td>
                <td>{{ $proyecto->d_actividades }}</td>
                <td>
                    
                    <a href="/Proyectos/{{$proyecto->id}}" class="btn btn-warning">Mostrar</a>
                    <a href="/ver-horario/{{$proyecto->id}}" class="btn btn-secondary">Horario</a> 
                    <a href="/seguimientos/{{$proyecto->id}}"  class="btn btn-info">Historico</a> 

                    @can('auxiliar-jefe', Auth::user())
                    <a href="/nuevo-seguimiento/{{$proyecto->id}}"  class="btn btn-dark">Seguimiento</a> 
                        
                    @endcan
                    
                    @can('jefe-only', Auth::user())
                        <a href="/Proyectos/{{$proyecto->id}}/edit" class="btn btn-success">Editar</a>
                        <form action="/Proyectos/{{$proyecto->id}}" method="post" style="display: inline;"  onsubmit="return confirm('Desea eliminar');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>    
                    @endcan
                
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="3">Sin proyectos registrados</td>
            </tr>
        @endforelse
    </tbody> 
</table>     
{{$historicos->links()}}


    </div>
</div>
@endcan



@endsection