@extends('layouts.app')


@section('content')
@if (session('error'))
<div>
    {{ session('error') }}
</div>
<br>
@endif
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/">Inicio</a></li>
    <li class="breadcrumb-item"><a href="/Proyectos">Proyectos</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{$proyecto->nombre}}</li>
</ol>
</nav>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Proyecto - {{$proyecto->nombre}}              
                </div>                  
                <div class="card-body">
                    
                                
                    <form action="/Proyectos/{{$proyecto->id}}" method="post" enctype="multipart/form-data" >
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="nombre">Nombre:</label>
                            <input id="nombre" type="text" name="nombre" class="form-control" value="{{$proyecto->nombre}}">
                        </div>


                        <div class="form-group">
                            <label for="d_actividades">Descripción:</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="d_actividades" id="d_actividades"   value="">{{$proyecto->d_actividades}}</textarea>
                            
                        </div>
                        
                        
                        
                        <input type="submit" class="btn btn-primary" value="Guardar">   



                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection