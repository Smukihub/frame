@extends('layouts.app')

 <script src="/bootstrap-4.5.3-dist/js/jquery-3.5.1.min.js"></script>
  <script src="/bootstrap-4.5.3-dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

  <script src="/bootstrap-4.5.3-dist/js/jquery-3.5.1.min.js"></script>
  <script src="/bootstrap-4.5.3-dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">


@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)

            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>


@endif
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/">Inicio</a></li>
    <li class="breadcrumb-item"><a href="/tablero">Tablero</a></li>
    <li class="breadcrumb-item"><a href="/Proyectos">Proyectos</a></li>
    <li class="breadcrumb-item active" aria-current="page">Registro</li>
</ol>
</nav>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registro') }}
                    
                </div>                  
                <div class="card-body">
                                        
                    <form action="/Proyectos" method="post" enctype="multipart/form-data" >
                        @csrf
                        <div class="form-group">
                            <label for="nombre">Nombre:</label>
                            <input id="nombre" type="text" name="nombre" class="form-control" value="{{ old('nombre') }}" >
                            {!! $errors->first('nombre','<smal>:message</smal>') !!} <br>
                        </div>
                    
                        <div class="form-group">
                            <label for="d_actividades">Descripción:</label>
                            <input type="text" name="d_actividades" id="d_actividades" class="form-control"  value="{{ old('d_actividades') }}" >
                        </div>
                        <div class="form-group">
                            <label>Prestador:</label>
                            <select name="prestador_id">
                            @forelse($prestadores as $prestador)
                                <option value="{{$prestador->id}}">{{$prestador->nombre}}</option>
                                @empty
                                <option disable>Sin aspirantes</option>
                            @endforelse
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Responsable:</label>
                            <select name="responsable_id">
                            @forelse($responsables as $responsable)
                            <option value="{{$responsable->id}}">{{$responsable->nombre}}</option>
                                
                            @empty
                                
                            @endforelse ($responsables as $responsable)
                                
                            
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Carta:</label>
                            <select name="carta_id">
                            @forelse($cartas as $carta)
                                <option value="{{$carta->id}}">{{$usuarios->carta}}</option>
                                @empty
                                <option disable>Sin aspirantes</option>
                            @endforelse
                            </select>
                        </div>

                        <input type="submit" class="btn btn-primary" value="Guardar">
                    </form>
                </div>
            

            </div>
        </div>
    </div>
</div>

@endsection