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
        <div class="container">
            <div class="card">
              <div class="card-header">
                <h3>
                  Espera a que te den de alta
                </h3>
              </div>
              <div class="card-body">
                <div class="form-group row">
                  <label  class="col-sm-2 col-form-label">Subir Carta</label>
                  <div class="col-sm-10">
                    <input type="file" readonly class="form-control-plaintext" id="archivoInput" onchange="return validarExt()">
                  </div>
                </div>
                <div id="visorArchivo">
  
                </div>
              </div>
            </div>
  
          </div>
          <script>
            /*var botonAsistencia = document.getElementById("asistenciaid")
                botonAsistencia.addEventListener("click",function(){
              let obj = { 
                _token: '{{ csrf_token() }}',
                carta : carta:carta.value,
                };
                fetch('/Horarios', {
                method: 'POST',
                headers: {
                  "Content-Type": "application/json",
                },
                body: JSON.stringify(obj)
                
              const data = await res.json()
              console.log(data)
              
                }        
              .then(response => response.json())
              .then(res=> {
                hora= res.registro.hora;
                dia = res.registro.dia;
                nombre = res.registro.proyecto.nombre;
                tabla = document.getElementById("tbl-horario");
                document.getElementById("tbl-horario").rows[hora].children[dia].innerText=nombre;
                x=1;
                console.log("pintar en dia: " + res.registro.x + " con hora " + res.registro.y + "para el proyecto")
                x++;
                });   
            });*/
        
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
@endsection