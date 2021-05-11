@extends('layouts.app')

 <script src="/bootstrap-4.5.3-dist/js/jquery-3.5.1.min.js"></script>
  <script src="/bootstrap-4.5.3-dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

@section('content')
@if (session('error'))
<div>
    {{ session('error') }}
</div>
<br>
@endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registro') }}</div>

                <div class="card-body">
                                        
                    <form action="/Usuarios" method="post" enctype="multipart/form-data" >
                        @csrf
                        <div class="form-group">
                            <label for="nombre">Nombre del usuario:</label>
                            <input id="nombre" type="text" name="nombre" class="form-control" value="{{ old('nombre') }}" required autocomplete="nombre" autofocus>
                        </div>
                        <div class="form-group">
                            <label for="apellido">Apellido del usuario:</label>
                            <input id="apellido" type="text" name="apellido" class="form-control" value="{{ old('apellido') }}" required autocomplete="apellido" autofocus>
                        </div>
                        <div class="form-group">
                            <label for="telefono">Teléfono:</label>
                            <input id="telefono" type="number" name="telefono" class="form-control" value="{{ old('telefono') }}" required autocomplete="telefono" autofocus>
                        </div>
                        <div class="form-group">
                            <label for="numcontrol">Número de control:</label>
                            <input id="numcontrol" type="numcontrol" name="numcontrol" class="form-control" value="{{ old('numcontrol') }}" required autocomplete="numcontrol" autofocus>
                        </div>
                        <div class="form-group">
                            <label for="path">Imagen del usuario:</label>
                            <input type="file" name="path" id="path">
                        </div>
                    
                        <div class="form-group">
                            <label for="activo">Activo:</label>
                            <select name="activo" id="activo">
                                <option>0</option>
                                <option>1</option>
                            
                            </select>
                        </div>  
                    
                        <div class="form-group">
                            <label for="status">Status:</label>
                            <select name="status" id="status">
                                <option>0</option>
                                <option>1</option>
                            
                            </select>
                        </div>  
                        <div class="form-group">
                            <label for="rol">Tipo de usuario:</label>
                            <select name="rol" id="rol">
                                <option>Jefe</option>
                                <option>Auxiliar</option>
                                <option>Externo</option>
                                <option>Prestador</option>
                                <option>Aspirante</option>
                            </select>
                        </div> 
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input id="email" type="email" name="email" class="form-control" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        </div>
                        <div class="form-group">
                            <label for="password">Password del usuario:</label>
                            <input id="password" type="password" name="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password2">Repita el password:</label>
                            <input id="password2" type="password" name="password2" class="form-control">
                        </div>
                    
                        <input type="submit" class="btn btn-primary" value="Guardar">    
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection