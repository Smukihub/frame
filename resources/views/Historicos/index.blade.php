@extends('layouts.app')

 <script src="/bootstrap-4.5.3-dist/js/jquery-3.5.1.min.js"></script>
  <script src="/bootstrap-4.5.3-dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/">Inicio</a></li>
    <li class="breadcrumb-item"><a href="/tablero">Tablero</a></li>
    <li class="breadcrumb-item"><a href="/Proyectos">Proyectos</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{ $proyecto->nombre }} - Historicos</li>
  </ol>
</nav>
<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-8">
          <div class="card">
              <div class="card-header">{{ __('Historicos') }}
                
              </div>                  
              <div class="card-body">
                <table class="table table-hover"   >
                  <thead>
                    
                    <th scope="col">Fecha</th>
                    <th scope="col">Dia</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Acciones</th>
                  </thead>
                  <tbody>
                    @forelse ($historicos as $historicos)
                    <tr>
                        <td>{{ $historicos->fecha }}</td>
                        <td>{{ $historicos->dia }}</td>
                        <td>{{ $historicos->tipo }}</td>
                         
                        <td>
                         
                          <a href="/Historicos/{{$historicos->id}}" class="btn btn-warning">Mostrar</a>
                          <form action="/Historicos/{{$historicos->id}}" method="post" style="display: inline;"  onsubmit="return confirm('Desea eliminar');">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-danger">Eliminar</button>
                          </form>    
                      </td>
            
                     
                    </tr>
                      @empty
                        <tr>
                            <td colspan="3">Sin  registros</td>
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