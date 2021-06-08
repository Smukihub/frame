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
      <li class="breadcrumb-item active" aria-current="page">Tablero</li>
      
    </ol>
  </nav>
  @switch(Auth::user()->rol)

      @case('Aspirante')
        
        <div class="container">
          <div class="card">
            <div class="card-header">
              <h3>
                Espera a que te den de alta
              </h3>
            </div>
            <div class="card-body">
              <div class="form-group row">
                <label  class="col-sm-2 col-form-label">Subir uCarta</label>
                <div class="col-sm-10">
                  <input type="file" readonly class="form-control-plaintext" id="archivoInput" onchange="return validarExt()">
                </div>
              </div>
              <div id="visorArchivo">

              </div>
              <button id="guardar"
              class ="btn btn-info"
              >aceptar
            </button>
            </div>
          </div>

        </div>
        <script>
          var guardar = document.getElementById("guardar")
          guardar.addEventListener("click",function(){
            let obj = { 
              _token: '{{ csrf_token() }}',
              carta : carta:carta.value,
              };
              fetch('/tablero', {
              method: 'POST',
              headers: {
                "Content-Type": "application/json",
              },
              body: JSON.stringify(obj)
              })        
              .then(response => response.json())
              .then(res=> {
              carta= res.registro.carta;
            });   
          });
      
          function validarExt()
          {
              var archivoInput = document.getElementById('archivoInput');
              var archivoRuta = archivoInput.value;
              var extPermitidas = /(.pdf)$/i;
              if(!extPermitidas.exec(archivoRuta)){
                  alert('Asegurese de haber seleccionado un PDF');
                  archivoInput.value = '';
                  return false;
              }

              else
              {
                  //PRevio del PDF
                  if (archivoInput.files && archivoInput.files[0]) 
                  {
                      var visor = new FileReader();
                      visor.onload = function(e) 
                      {
                          document.getElementById('visorArchivo').innerHTML = 
                          '<embed src="'+e.target.result+'" width="500" height="375" />';
                      };
                      visor.readAsDataURL(archivoInput.files[0]);
                  }
              }
          }
        </script>
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
        <br> 
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
        <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">  
          <h1>
            Tablero - Auxiliar
          </h1>
        </div>
        <div class="container">
          <div class="row justify-content-center">
              <div class="col-md-12">
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
                                          <a href="/Proyectos/{{$proyectos->id}}" class="btn btn-warning">Mostrar</a>
                                          <a href="/ver-horario/{{$proyectos->id}}" class="btn btn-primary">Horario</a> 
                                          <a href="/seguimientos/{{$proyectos->id}}"  class="btn btn-info">Historico</a> 
                                          <a href="/nuevo-seguimiento/{{$proyectos->id}}"  class="btn btn-dark">Seguimiento</a> 
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

      @break
      @case('Externo')
        <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">  
          <h1>
            Tablero - Externo
          </h1>
        </div>
        <div class="card  shadow-sm">
          <div class="card-header">
            <h4>
              Horario general
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
        <script>
          @foreach ($horarios as $horario)
            actual= document.getElementById("tbl-horario").rows[{{$horario->hora}}].children[{{$horario->dia}}].innerText;
            if (actual!="") actual +=", ";
            document.getElementById("tbl-horario").rows[{{$horario->hora}}].children[{{$horario->dia}}].innerText= actual + '{{substr($horario->proyecto->prestador->nombre,0,1)}}' + '{{substr($horario->proyecto->prestador->apellido,0,1)}}';  
          @endforeach
        </script> 
      @break
      @case('Prestador')
      @break
  @endswitch
@endsection
