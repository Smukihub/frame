@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registro') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="nombre">Nombre</label>
                                <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') }}" required autocomplete="nombre" autofocus>   
                                @error('nombre ')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror                                                             
                            </div>                       
                            <div class="col-md-6 mb-3">
                                <label for="apellido">Apellido</label>
                                <input id="apellido" type="text" class="form-control @error('apellido') is-invalid @enderror" name="apellido" value="{{ old('apellido') }}" required autocomplete="apellido" autofocus>   
                                
                                    @error('apellido ')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                                            
                            </div> 
                        </div>
                        <div class=" row">
                            <div class="col-md-6 mb-3">
                                <label for="email" >Email</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">  
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="numcontrol">{{ __('Número de control') }}</label>
                                <input id="numcontrol" type="number" class="form-control" name="numcontrol" required autocomplete="new-numcontrol">
                                    @error('numcontrol')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror                                
                            </div>                         
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="password" >{{ __('Contraseña') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror " name="password" required autocomplete="new-password">
                                    
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                            </div>                             
                            <div class="col-md-6 mb-4">
                                <label for="password-confirm" >{{ __('Confirmar Contraseña') }}</label>
                                <input id="password-confirm" type="password" class="form-control" name="password-confirm" required autocomplete="password2">
                                
                                    @error('password2')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                                            
                            </div> 
                        </div> 
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="telefono" >{{ __('Teléfono') }}</label>
                                <input id="telefono" type="number" class="form-control @error('telefono') is-invalid @enderror " name="telefono" required autocomplete="new-telefono">
                                    @error('telefono')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror                
                            </div>  
                        
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="telefono" >{{ __('Carta') }}</label>
                                <input type="file" readonly class="form-control-plaintext" id="archivoInput" onchange="return validarExt()" class="form-control @error('carta') is-invalid @enderror " name="carta"  autocomplete="new-telefono">
                                <div id="visorArchivo">
                    
                                </div>    
                            </div>
                        </div> 
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Registrar') }}
                                </button>
                            </div>
                        </div> 
                    </form>  
                                        
                </div>                                             
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
