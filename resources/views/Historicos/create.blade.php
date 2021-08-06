@extends('layouts.app')



@section('content')

@can('jefe-only', Auth::user())
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Inicio</a></li>
        <li class="breadcrumb-item"><a href="/Proyectos">Proyectos</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{$proyecto->nombre}}</li>
      </ol>
    </nav>
@endcan
    
<body>
  <div class="card mb-4 shadow-sm">
      <div class="card-header">
        <h4 class="my-0 font-weight-normal">
          Asistencia
         
        </h4>
      </div>     
      <div class="card-body">
        <div class="container">
          <div class="row">
            <div class="col-4">
              <form action="/seguimientos/{{$proyecto->id}}" method="post" enctype="multipart/form-data">
              @csrf
                <div class="form-group col-md-8">
                  <label for="fecha">Fecha:</label>
                  <input type="date" name="fecha" id="fecha" name="fecha" class="form-control" required>
                </div>
                <div class="form-group col-md-8">
                  <label for="proyecto_id">Proyecto:</label>
                  <input type="text"  id="proyecto_id" name="proyecto_id" class="form-control" value="{{$proyecto->nombre}}" disabled> 
                </div>

                <div class="form-group col-md-8">
                  <label for="hora">Hora:</label>
                  <select id="hora" name="hora" class="form-control" required>
                    
                    <option value="0">8 a.m - 9 a.m</option>
                    <option value="1">9 a.m - 10 a.m</option>
                    <option value="2">10 a.m - 11 a.m</option>
                    <option value="3">11 a.m - 12 p.m</option>
                    <option value="4">12 p.m - 1 p.m</option>
                    <option value="5">1 p.m - 2 p.m</option>
                    <option value="6">2 p.m - 3 p.m</option>
                    <option value="7">3 p.m - 4 p.m</option>
                    <option value="8">4 p.m - 5 p.m</option>
                    <option value="9">5 p.m - 6 p.m</option>
                    <option value="10">6 p.m - 7 p.m</option>
                    <option value="11">7 p.m - 8 p.m</option>
                    <option value="12">8 p.m - 9 p.m</option>
                  </select>
                </div>


                <div class="form-group col-md-12">
                  <label style="display: block">Seleccionar tipo:</label>
                    <input type="button" id="asistenciaid" class="btn btn-primary" value="Asistencia">
                    <input type="button" id="retardoid"  class="btn btn-warning" value="Retardo">
                    <input type="button" id="faltaid"  class="btn btn-danger" value="Falta">
                    <input type="hidden" id="tipo" name="tipo">
                </div>

              <div id="idcontenido">

              </div>

                
                
                
            
                
              </form>

            </div>
            <div class="col-8">
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
                  <tr  class="table table-sm table-bordered"  aria-hora ="8">
                    <th> 8 a.m. - 9 a.m. </th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr class="table table-sm table-bordered" aria-hora ="9" >
                    <th>9 a.m. - 10 a.m.</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr  class="table table-sm table-bordered" aria-hora ="10">
                    <th>10 a.m. - 11 a.m</th>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                  </tr>
                  <tr class="table table-sm table-bordered" > 
                    <th >11 a.m. - 12 p.m.</th>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                  </tr>
                
                  <tr class="table table-sm table-bordered" > 
                    <th>12 p.m. - 1 p.m.</th>
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
  </div>

  <script>
    @foreach ($proyecto->horarios as $horario)
      document.getElementById("tbl-horario").rows[{{$horario->hora}}].children[{{$horario->dia}}].innerText='{{$horario->proyecto->nombre}}';  
    @endforeach


    var botonAsistencia = document.getElementById("asistenciaid")
    botonAsistencia.addEventListener("click",function(){

      var icontenido = document.getElementById("idcontenido")
      var textotipo = document.getElementById("tipo")
      tipo.setAttribute('value','asistencia');

      icontenido.innerHTML = 
        "<div class='form-group col-md-12 ' >"+
          "<label for='exampleFormControlTextarea1'>Descripción de actividades:</label>"+
          "<textarea class='form-control' id='actv' name='actv' rows='3' required></textarea>"+
          "<br>" +
          "Cuantas horas llego: <input type='number' name='juntas' class='form-control'>" +               
          "<br>" +
          "<input class='btn btn-primary'  id ='guardar' type='submit' value='Guardar'>" +             
        "</div>"
      },false);

    var botonRetardo = document.getElementById("retardoid")
    botonRetardo.addEventListener("click",function(){
      var icontenido = document.getElementById("idcontenido")
      var textotipo = document.getElementById("tipo")
      tipo.setAttribute('value','retardo');
          icontenido.innerHTML = 
          "<div class='form-group col-md-12 '>"+
            "<label for='exampleFormControlTextarea1'>Seleccione hora de llegada</label>"+
            "<input type='time' class='form-control' id='horares'  name='horares' required>"+
            "<br>"+
            "<input class='btn btn-primary'  id ='guardar' type='submit' value='Guardar'>" +  
          "</div>"
      },false);

    var botonFalta = document.getElementById("faltaid")
    botonFalta.addEventListener("click",function(){
      var icontenido = document.getElementById("idcontenido")
      var textotipo = document.getElementById("tipo")
      tipo.setAttribute('value','falta');
          icontenido.innerHTML = 
          "<div class='form-group col-md-12'>"+
            "<label for='exampleFormControlTextarea1'>Justificación:</label>"+
            "<textarea class='form-control' id='justi' name='justi' rows='3' required></textarea>"+
            " <br>"+
            "<input class='btn btn-primary'  id ='guardar' type='submit' value='Guardar'>" +  
          "</div>"
      },false);

  </script>

</body>
@endsection