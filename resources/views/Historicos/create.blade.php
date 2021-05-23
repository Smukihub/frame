@extends('layouts.app')

 <script src="/bootstrap-4.5.3-dist/js/jquery-3.5.1.min.js"></script>
  <script src="/bootstrap-4.5.3-dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

  <script src="/bootstrap-4.5.3-dist/js/jquery-3.5.1.min.js"></script>
  <script src="/bootstrap-4.5.3-dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">



@section('content')

<header>
    <div class="text-center">
      <h1>
        Control de asistencias del proyecto
      </h1>
    </div>
  
  </header>
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
              <form action="/Historicos" method="post" enctype="multipart/form-data">
              @csrf
                <div class="form-group col-md-8">
                  <label for="dia">Dia:</label>
                  <select id="dia"  name="dia" class="form-control" required>
                  <option selected disabled>Seleccione día</option>
                    <option value="1">Lunes</option>
                    <option value="2">Martes</option>
                    <option value="3">Miercoles</option>
                    <option value="4">Jueves</option>
                    <option value="5">Viernes</option>
                  </select>
                  <div class="invalid-feedback">
                    Por favor, seleccione día
                  </div>
                </div>
                <div class="form-group col-md-8">
                  <label for="hora">Hora:</label>
                  <select id="hora" name="hora" class="form-control">
                  <option selected>Seleccione hora</option>
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
                  <label for="hora">Seleccionar tipo:</label>
                  <div class="form-group ">
                    <input type="button" id="asistenciaid" class="btn btn-primary" value="Asistencia"></input>
                    <input type="button" id="retardoid"  class="btn btn-warning" value="Retardo"></input>
                    <input type="button" id="faltaid"  class="btn btn-danger" value="Falta"></input>
                 </div>
                </div>
                
                
              

                <div class="form-group col-md-12" id="contenido">
               
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
                  <tr aria-hora ="8">
                    <th> 8 a.m. - 9 a.m. </th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr aria-hora ="9" >
                    <th>9 a.m. - 10 a.m.</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr aria-hora ="10">
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
        rwgqwrg
        </div>
      </div>
  </div>
  <script>
    var botonAsistencia = document.getElementById("asistenciaid")
    botonAsistencia.addEventListener("click",function(){
      var icontenido = document.getElementById("contenido")
      icontenido.innerHTML = 
      "<br>"
      +" <label for='actv'>Actividades Realizadas</label>" +
       "<textarea class='form-control' id='actv' rows='3'></textarea>"+
       "<br>"+
       "<input type='submit' class='btn btn-primary' value='Guardar'> "
      },false);

      var botonRetardo = document.getElementById("retardoid")
        botonRetardo.addEventListener("click",function(){
          var icontenido = document.getElementById("contenido")
          icontenido.innerHTML = 
          "<br>"+
          " <div class='form-group'><label for='exampleFormControlTextarea1'>Seleccione hora de llegada</label><input type='time'></div>" +
          "<input type='submit' class='btn btn-primary' value='Guardar'>"
          },false);


      var botonFalta = document.getElementById("faltaid")
         botonFalta.addEventListener("click",function(){
          var icontenido = document.getElementById("contenido")
          icontenido.innerHTML = 
          "<br>"
          +" <label for='justi'>Justificacion</label>" +
          "<textarea class='form-control' id='justi' rows='3'></textarea>"+
          "<br>"+
          "<input type='submit' class='btn btn-primary' value='Guardar'> "
          },false);
  </script>

</body>

   
          
       
        
     
  
  
     
     
  
@endsection