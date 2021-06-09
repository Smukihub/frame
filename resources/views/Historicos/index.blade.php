@extends('layouts.app')

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
        <li class="breadcrumb-item active" aria-current="page">{{$proyecto->nombre}} - Historicos</li>
      </ol>
    </nav>
        @break
    @case('Auxiliar')
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Inicio</a></li>
        <li class="breadcrumb-item"><a href="/tablero">Tablero</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{$proyecto->nombre}} - Historicos</li>
      </ol>
    </nav>
        
        @break
    @default
        
@endswitch



<div class="container">
  <div class="row">
    <nav class="navbar navbar-light float-right">       
      <form class="form-inline">
        <input name="buscar" class="form-control mr-sm-2" type="search" placeholder="Buscar..." aria-label="Search">
        <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Buscar</button>
      </form>
    </nav>
  </div>
  <div class="row justify-content-center">
      <div class="col-md-12">
      
        
          <div class="card">
            
              <div class="card-header">{{ __('Historicos') }}
                
              </div>                  
              <div class="card-body">
                <table class="table table-hover"   >
                  <thead>
                    
                    <th scope="col">Fecha<a href="/seguimientos/{{$proyecto->id}}?oAF=si">A</a> <a href="/seguimientos/{{$proyecto->id}}?oDF=si">D</a> F</th>
                    <th scope="col">Dia<a href="/seguimientos/{{$proyecto->id}}?oAD=si">A</a> <a href="/seguimientos/{{$proyecto->id}}?oDD=si">D</a> F</th>
                    <th scope="col">Hora<a href="/seguimientos/{{$proyecto->id}}?oAH=si">A</a> <a href="/seguimientos/{{$proyecto->id}}?oDH=si">D</a> F</th>
                    <th scope="col">Tipo <a href="/seguimientos/{{$proyecto->id}}?oAT=si">A</a> <a href="/seguimientos/{{$proyecto->id}}?oDT=si">D</a> F</th>
                    <th scope="col">Detalles</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($historico as $historicos)
                    <tr>
                        <td>{{ $historicos->fecha }}</td>
                        <td>{{ $historicos->dia }}</td>
                        <td>{{$historicos->horaVisible()}}</td>
                        <td>{{ $historicos->tipo }}</td>
                         
                        <td>
                          @switch($historicos->tipo)
                          @case('Asistencia')
                          
                          {{$historicos->actv}}
                              @break
                          @case('Retardo')

                          {{$historicos->horares}}
                              @break
                          @case('Falta')
                          {{$historicos->justi}}
                          
                              
                      @endswitch
                      </td>
            
                     
                    </tr>
                      @empty
                        <tr>
                            <td colspan="5">Sin  registros</td>
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