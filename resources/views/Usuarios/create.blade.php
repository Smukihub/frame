@extends('layouts.app')



@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/">Inicio</a></li>
    <li class="breadcrumb-item"><a href="/Usuarios">Usuarios</a></li>
    <li class="breadcrumb-item active" aria-current="page">Registro</li>
  </ol>
</nav>



<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registro') }}</div>

                <div class="card-body">
                                        
                    <form action="/Usuarios" method="post" enctype="multipart/form-data" >
                        @csrf
                        <div class=" row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="nombre">Nombre del usuario:</label>
                                    <input id="nombre" type="text" name="nombre" class="form-control" value="{{ old('nombre') }}" required autocomplete="nombre" autofocus>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="apellido">Apellido del usuario:</label>
                                    <input id="apellido" type="text" name="apellido" class="form-control" value="{{ old('apellido') }}" required autocomplete="apellido" autofocus>
                                </div>
                            </div>
                        </div>
                       
                        <div class=" row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="telefono">Teléfono:</label>
                                    <input id="telefono" type="number" name="telefono" class="form-control" value="{{ old('telefono') }}" required autocomplete="telefono" autofocus>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="numcontrol">Número de control:</label>
                                    <input id="numcontrol" type="numcontrol" name="numcontrol" class="form-control" value="{{ old('numcontrol') }}" required autocomplete="numcontrol" autofocus>
                                </div>
                            </div>
                        </div>
                       
                       
                        <div class="form-group">
                            <label for="path">Imagen del usuario:</label>
                            <input  type="file" name="path" id="path">
                        </div>
                        <div class=" row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="activo">Activo:</label>
                                    <select class="form-control" name="activo" id="activo">
                                        <option>0</option>
                                        <option>1</option>
                                    
                                    </select>
                                </div>  
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="status">Status:</label>
                                    <select class="form-control" name="status" id="status">
                                        <option>0</option>
                                        <option>1</option>
                                    
                                    </select>
                                </div> 
                            </div>

                        </div>
                      
                        <div class=" row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="rol">Tipo de usuario:</label>
                                    <select class="form-control" name="rol" id="rol">
                                        <option>Jefe</option>
                                        <option>Auxiliar</option>
                                        <option>Externo</option>
                                        <option>Prestador</option>
                                        <option>Aspirante</option>
                                    </select>
                                </div> 
                              
                            </div>
                            <div class="col-md-6 mb-3">
                                
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input id="email" type="email" name="email" class="form-control" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        </div>
                            </div>
                        </div>
                      
                      
                        <div class=" row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="password">Password del usuario:</label>
                                    <input id="password" type="password" name="password" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="password2">Repita el password:</label>
                                    <input id="password2" type="password" name="password2" class="form-control">
                                </div>
                            </div>
                        </div>
                       
                      
                    
                        <input type="submit" class="btn btn-primary" value="Guardar">    
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

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
            //Previo del PDF
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