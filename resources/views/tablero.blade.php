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
    
  </ol>
</nav>
@switch(Auth::user()->rol)

    @case('Aspirante')

    <h1>

      Espera a que te den de alta

    </h1>
    @break
    @case( 'Jefe' )
     
      <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">  
        <h1>
          Tablero - Jefe de laboratorio
        </h1>
      </div>
     
      

      

  <div class="row">
    <div class="col-md-auto">
    <div class="card  shadow-sm">
            <div class="card-header">
              <h4>
                <a href="/Usuarios" style="color:black">Lista de Usuarios</a>
              </h4>
              
            </div>
            <div class="card-body">
            
              <table class="table table-hover"  text-center="">
               
                <tbody>
                  
                  @forelse ($usuarios as $usuario)
                  <tr class="table table-sm table-bordered" >
                  
                    <td scope="row">{{$usuario->nombre}}</th>
                    <td scope="row">{{$usuario->rol}}</th>
                    
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
   
    <div class="col">
      <div class="card  shadow-sm">
              <div class="card-header">
                <h4>
                  <a href="/Horarios" style="color:black">Lista de Horarios</a>
                </h4>
              </div>
              <div class="card-body">
                <div class="container">
                  <table class="table table-hover table-bordered"  id="tbl-horario" >
                  <thead>
                    <tr class="table table-sm table-bordered" >        
                      <th scope="row"class="bg-success ">Hora</th>
                      <th scope="row"class="bg-success">Lunes</th>
                      <th scope="row"class="bg-success">Martes</th>
                      <th scope="row"class="bg-success">Miercoles</th>
                      <th scope="row"class="bg-success">Jueves</th>
                      <th scope="row"class="bg-success">Viernes</th>
                    </tr>        
                  </thead>
                  <tbody>
                    <tr aria-hora ="8">
                      <th>8 a.m. - 9 a.m.</th>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr aria-hora ="9" >
                      <th>9 a.m. - 10 a.m. </th>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr aria-hora ="10">
                      <th>10 a.m. - 11 a.m.</th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr class="table table-sm table-bordered" > 
                      <th >11 a.m. - 12 p.m. </th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                  
                    <tr class="table table-sm table-bordered" > 
                      <th >12 p.m. - 1 p.m. </th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                  
                    <tr class="table table-sm table-bordered" > 
                      <th >1 p.m. - 2 p.m. </th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                  
                    <tr class="table table-sm table-bordered" > 
                      <th  >3 p.m. - 4 p.m. </th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr class="table table-sm table-bordered" > 
                      <th  >4 p.m. - 5 p.m. </th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr class="table table-sm table-bordered" > 
                      <td  > 5 p.m. - 6 p.m. </th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr class="table table-sm table-bordered" > 
                      <th  >6 p.m. - 7 p.m. </th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr class="table table-sm table-bordered" > 
                      <th  >7 p.m. - 8 p.m. </th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr class="table table-sm table-bordered" > 
                      <th >8 p.m. - 9 p.m. </th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>     
                  </tbody>
                </table>
                
                </div>
          
                
              </div>
            </div>

      </div>
  
    <div class="col-md-auto">
      <div class="card  shadow-sm">
              <div class="card-header">
                <h4>
                  <a href="/Proyectos" style="color:black">Lista de Proyectos</a>
                </h4>
              </div>
              <div class="card-body">
                <table class="table table-hover"  text-center="">
                 
                  <tbody>
                  
                    @forelse ($proyectos as $proyectos)
                    <tr class="table table-sm table-bordered" >
                    
                      <td scope="row">{{$proyectos->nombre}}</th>
                      
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


        
       
     
      <div class="container">
        <div class="card-deck mb-3 text-center">
          <div class="card mb-4 shadow-sm">
            <div class="card-header">
              <h4 class="my-0 font-weight-normal">Avance de Proyecto 1</h4>
            </div>
          
          </div>
          <div class="card mb-4 shadow-sm">
            <div class="card-header">
              <h4 class="my-0 font-weight-normal">Avance de Proyecto 2</h4>
            </div>
            
          </div>
        
        </div>
      </div>

      <script>
        @foreach ($horarios as $horario)
    actual= document.getElementById("tbl-horario").rows[{{$horario->hora}}].children[{{$horario->dia}}].innerText;
    if (actual!="") actual +=", ";
    document.getElementById("tbl-horario").rows[{{$horario->hora}}].children[{{$horario->dia}}].innerText= actual + '{{substr($horario->proyecto->prestador->nombre,0,1)}}' + '{{substr($horario->proyecto->prestador->apellido,0,1)}}';  
  @endforeach
      </script>
    @break
    @case('Auxiliar')
    <HEAder class="container-fluid">
      <div class="row">
         <div class="col-12 align-self-center text-center">
            <h1>
              Tablero - Auxiliar
            </h1>
            
           
         </div>
      </div>
     </HEAder>

    <div class="container">
      <div class="card mb-4 shadow-sm">
        <div class="card-header">
          <h4 class="my-0 font-weight-normal">
            
          </h4>
        </div>
        <div class="card-body">
             
          <div>
            <table class="table table-hover"   >
              <thead>
                <th scope="row" class="bg-success text-center">Proyecto</th>
                  <th scope="row" class="bg-success text-center">Prestador</th>
                  <th scope="row" class="bg-success text-center">Acciones</th>
              </thead>
              <tbody>
                @forelse ($proyectos as $proyectos)
                <tr> @if($proyectos->nombre)
                
                @endif
                
                    <td class="text-center">{{ $proyectos->nombre }}</td>
                    <td class="text-center">usuario </td>
                    
                   
                  
                    
                    <td class="text-center">
                        <a href="/Historicos" class="btn btn-info tect-center">Historico</a>
                        <a href="/Historicos/create" class="btn btn-warning">Control de Asistencias</a> 
                     
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
    @break
    @case('Externo')
    <h1>
      Tablero - Externo
    </h1>
    <br>
  <h2>
   Horario del laboratorio
  </h2>
  
  
        @break
    @case('Prestador')
    <div class="card-columns">
      <div class="card">
        <h1>
             Estatus del proyecto - Prestador
        </h1>
        <br>
        <h2>
             Avance del proyecto
        </h2>
      </div>
    </div>
      @break

@endswitch



@endsection
