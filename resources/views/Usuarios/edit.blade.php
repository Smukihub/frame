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
                <div class="card-header">{{ __('Editar') }}</div>

                <div class="card-body">
                    
<form action="/Usuarios/{{$usuario->id}}" method="post" enctype="multipart/form-data" >
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="nombre">Nombre:</label>
        <input id="nombre" type="text" name="nombre" class="form-control" value="{{$usuario->nombre}}">
    </div>


    <div class="form-group">
        <label for="apellido">Apellido:</label>
        <input id="apellido" type="text" name="apellido" class="form-control" value="{{$usuario->apellido}}">
    </div>
    
    <div class="form-group">
        <label for="telefono">Teléfono:</label>
        <input id="telefono" type="number" name="telefono" class="form-control" value="{{$usuario->telefono}}">
    </div>
   
    <div class="form-group">
        <label for="rol">Tipo de usuario:</label>
        <select name="rol" id="rol">
            @if ($usuario->rol =="Jefe")
                <option selected>Jefe</option>
            @else
                <option>Jefe</option>
            @endif
            @if ($usuario->rol=="Auxiliar")
                <option selected>Auxiliar</option>
            @else
                <option>Auxiliar</option>
            @endif
            @if ($usuario->rol=="Externo")
                <option selected>Externo</option>
            @else
                <option>Externo</option>
            @endif
            @if ($usuario->rol=="Prestador")
                <option selected>Prestador</option>
            @else
                <option>Prestador</option>
            @endif
            @if ($usuario->rol=="Aspirante")
            <option selected>Aspirante</option>
        @else
                <option>Aspirante</option>
        @endif
        </select>
    </div> 
    <div class="form-group">
        <label for="email">E-mail:</label>
        <input id="email" type="email" name="email" class="form-control" value="{{$usuario->email}}">
    </div>
    <div class="form-group">
        <label for="password">Password del usuario:</label>
        <input id="password" type="password" name="password" class="form-control">
    </div>
    <div class="form-group">
        <label for="password2">Repita el password:</label>
        <input id="password2" type="password" name="password2" class="form-control">
    </div> 
    <div class="form-group">
        <label for="path">Imagen del usuario:</label>
        <img src="/storage/images/{{$usuario->path}}" alt="" class="img-thumnail" style="width: 80px;height: 80px; padding: 10px; margin: 0px; ">
        <input type="file" name="path" id="path">
    </div>
    
    <input type="submit" class="btn btn-primary" value="Guardar">   



</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection