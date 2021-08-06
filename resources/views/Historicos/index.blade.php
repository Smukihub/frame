@extends('layouts.app')


@section('content')
@can('jefe-only', Auth::user())
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Inicio</a></li>
        <li class="breadcrumb-item"><a href="/Proyectos">Proyectos</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{$proyecto->nombre}} - Historicos</li>
      </ol>
    </nav>
@endcan
<div class="container">
 
  <div class="row justify-content-center">
      <div class="col-md-12">
      
        
          <div class="card">
            
              <div class="card-header">
                <h4 class="my-0 font-weight-normal">
                Historicos
              
                </h4>
              </div>                  
              <div class="card-body">
                <table class="table table-hover"   >
                  <thead>                   
                    <th scope="col">Fecha <a href="/seguimientos/{{$proyecto->id}}?oAF=si"><i class="fas fa-angle-up"></i></a> <a href="/seguimientos/{{$proyecto->id}}?oDF=si"><i class="fas fa-angle-down"></i></a> F</th>
                    <th scope="col">Dia <a href="/seguimientos/{{$proyecto->id}}?oAD=si"><i class="fas fa-angle-up"></i></a> <a href="/seguimientos/{{$proyecto->id}}?oDD=si"><i class="fas fa-angle-down"></i></a> F</th>
                    <th scope="col">Hora <a href="/seguimientos/{{$proyecto->id}}?oAH=si"><i class="fas fa-angle-up"></i></a> <a href="/seguimientos/{{$proyecto->id}}?oDH=si"><i class="fas fa-angle-down"></i></a> F</th>
                    <th scope="col">Tipo <a href="/seguimientos/{{$proyecto->id}}?oAT=si"><i class="fas fa-angle-up"></i></a> <a href="/seguimientos/{{$proyecto->id}}?oDT=si"><i class="fas fa-angle-down"></i></a> F</th>
                    <th scope="col">Detalles<br>
                      {{--<form action="/seguimientos/{{$proyecto->id}}" method="get">
                        @csrf
                        <input type="text" name="detalles" >
                      </form> --}}
                      
                    </th>
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