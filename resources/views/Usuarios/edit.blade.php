@extends('layouts.app')

@section('content')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/">Inicio</a></li>
   
    <li class="breadcrumb-item"><a href="/Usuarios">Usuarios</a></li>
    <li class="breadcrumb-item active" aria-current="page">Usuario - {{$usuario->nombre}}</li>
  </ol>
</nav>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar - {{$usuario->nombre}} </div>

                <div class="card-body">
                    
<form action="/Usuarios/{{$usuario->id}}" method="post" enctype="multipart/form-data" >
    @csrf
    @method('PUT')
    <div class=" row">
        <div class="col-md-6 mb-3">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input id="nombre" type="text" name="nombre" class="form-control" value="{{$usuario->nombre}}" required>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="form-group">
                <label for="apellido">Apellido:</label>
                <input id="apellido" type="text" name="apellido" class="form-control" value="{{$usuario->apellido}}" required>
            </div>
        </div>
    </div>
    <div class=" row">
        <div class="col-md-6 mb-3">
            <div class="form-group">
                <label for="telefono">Teléfono:</label>
                <input id="telefono" type="number" name="telefono" class="form-control" value="{{$usuario->telefono}}" required>
            </div>
        </div>
        <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="numcontrol">Número de control:</label>
                    <input id="numcontrol" type="numcontrol" name="numcontrol" class="form-control"  value="{{$usuario->numcontrol}}" required autocomplete="numcontrol" autofocus>
                </div>
        </div>
    </div>
   
    <div class=" row">
        <div class="col-md-6 mb-3">
            <div class="form-group">
                <label for="status">Status:</label>
                <select class="form-control" name="status" id="status" required>
                    @if ($usuario->status =="0")
                        <option selected>0</option>
                    @else
                        <option>0</option>
                    @endif
                    @if ($usuario->status=="1")
                        <option selected>1</option>
                    @else
                        <option>1</option>
                    @endif
                </select>
            </div> 
        </div>
        <div class="col-md-6 mb-3">
            <div class="form-group">
                <label for="activo">Activo:</label>
                <select class="form-control" name="activo" id="activo" required>
                    @if ($usuario->activo =="0")
                        <option selected>0</option>
                    @else
                        <option>0</option>
                    @endif
                    @if ($usuario->activo=="1")
                        <option selected>1</option>
                    @else
                        <option>1</option>
                    @endif
                </select>
            </div> 
        </div>
    </div>
    <div class=" row">
        <div class="col-md-6 mb-3">
            <div class="form-group">
                <label for="rol">Tipo de usuario:</label>
                <select class="form-control" name="rol" id="rol" required>
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
        </div>
        <div class="col-md-6 mb-3">
            <div class="form-group">
                <label for="email">E-mail:</label>
                <input id="email" type="email" name="email" class="form-control" value="{{$usuario->email}}" required>
            </div>
        </div>
    </div>

    <div class=" row">
        <div class="col-md-6 mb-3">
            <div class="form-group">
                <label for="password">Password del usuario:</label>
                <input id="password" type="password" name="password" class="form-control" required>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="form-group">
                <label for="password2">Repita el password:</label>
                <input id="password2" type="password" name="password2" class="form-control" required>
            </div> 
        </div>
    </div>

    <div class="form-group">
        <label for="path">Imagen del usuario:</label>
        <img src="/images/{{$usuario->path}}" alt="" class="img-thumnail" style="width: 80px;height: 80px; padding: 10px; margin: 0px; ">
        <input type="file" name="path" id="path" required>
    </div>
    
    <input type="submit" class="btn btn-primary" value="Guardar">   



</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection