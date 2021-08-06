@extends('layouts.app')


@section('content')
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page">Inicio</li>
      
    </ol>
  </nav>
          
        <div class="row">
          @can('jefe-only', Auth::user()) 
          <div class="col-md-auto">
            <div class="card  shadow-sm">
              <div class="card-header">
                <h4>
                  <a href="/Usuarios" style="color:black">Lista de Usuarios</a>
                </h4>              
              </div>
              <div class="card-body" >   
                <div style="width:200px; height:300px; overflow:auto;"> 
                  <table class="table table-hover"  text-center="">
                    <thead class="table table-sm table-bordered">
                      <tr>
                        <th>Usuario</th>
                        <th>Tipo</th>
                      </tr>
                    </thead>
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
          </div>  
          @endcan
          @can('externo-jefe', Auth::user()) 
          <div class="col">
            <div class="card  shadow-sm">
              <div class="card-header">
                <h4>
                  <a href="/Horarios" style="color:black">Horario General</a>
                </h4>
              </div>
              <div class="card-body">
                <div class="container">
                  <table class="table table-sm"  id="tbl-horario" >
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
                      <tr class="table table-sm table-bordered" aria-hora ="8">
                        <th>8 a.m. - 9 a.m.</th>
                        <td ></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr class="table table-sm table-bordered" aria-hora ="9" >
                        <th>9 a.m. - 10 a.m. </th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr class="table table-sm table-bordered" aria-hora ="10">
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
                        <th >2 p.m. - 3 p.m. </th>
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
                        <th  > 5 p.m. - 6 p.m. </th>
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
          @endcan   
          @can('jefe-only', Auth::user())  
          <div class="col-md-auto">
            <div class="card  shadow-sm">
              <div class="card-header">
                <h4>
                  <a href="/Proyectos" style="color:black">Lista de Proyectos</a>
                </h4>
              </div>
              <div class="card-body">
                <h3>Activos</h3>
                <div style="width:200px; height:250px; overflow:auto;"> 
                  <table class="table table-hover"  text-center="">
                  
                    <tbody>
                    
                      @forelse ($proyectos as $proyecto)
                      <tr class="table table-sm table-bordered" >
                      
                        <td scope="row">{{$proyecto->nombre}}</th>
                        
                      </tr>
                    
                      @empty
                      <tr>
                          <td colspan="3">Sin proyectos registrados</td>
                      </tr>
                      @endforelse
                    
                    </tbody>
                  </table>
                </div>
               

                <h3>Antiguos</h3>
                <div style="width:200px; height:250px; overflow:auto;"> 
                  <table class="table table-hover"  text-center="">
                  
                    <tbody>
                    
                      @forelse ($historicos as $proyecto)
                      <tr class="table table-sm table-bordered" >
                      
                        <td scope="row">{{$proyecto->nombre}}</th>
                        
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
          @endcan
        </div> 
            
        <br> 
        @can('prestador-jefe', Auth::user()) 
        <div class="container">
         
          <div class="card-deck mb-3 text-center ">
          
            @foreach ($proyectos as $proyecto)
              <div class="card mb-4 shadow-sm">
                <div class="card-header">
                  <h4 class="my-0 font-weight-normal">
                    <a href="/Proyectos" style="color:black">
                    Avance del Proyecto {{$proyecto->nombre}}
                    </a> 
                  </h4>
                </div>   
                
                <div class="card-body">
                  {{$proyecto->cuentas}} de {{$proyecto->total}}
                  <canvas id="myChart{{$loop->iteration}}" width="300" height="300"></canvas>
                </div>
              </div>
                
            @endforeach          

          </div>
        </div>  
        @endcan

        <script>
          @can('externo-jefe', Auth::user()) 
          @foreach ($horarios as $horario)
            actual= document.getElementById("tbl-horario").rows[{{$horario->hora}}].children[{{$horario->dia}}].innerText;
            if (actual!="") actual +=", ";
            document.getElementById("tbl-horario").rows[{{$horario->hora}}].children[{{$horario->dia}}].innerText= actual + '{{substr($horario->proyecto->prestador->nombre,0,1)}}' + '{{substr($horario->proyecto->prestador->apellido,0,1)}}';  
          @endforeach
          @endcan

          @foreach ($proyectos as $proyecto)
          var ctx = document.getElementById("myChart{{$loop->iteration}}").getContext("2d");
          var myChart = new Chart(ctx,{
            type:'doughnut',
            data: {
              labels: [
                'Horas completadas',
                'Horas total'
                ],
              datasets: [{
                label: 'Avance',
                data: [{{$proyecto->cuentas}}, {{$proyecto->total}}],
                backgroundColor: [
                  'rgb(255, 99, 132)',
                  'rgb(54, 162, 235)'
                  
                ],
                hoverOffset: 4
              }]
                    }
          })
          @endforeach  
        

        </script>

@endsection
