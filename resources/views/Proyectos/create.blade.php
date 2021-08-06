@extends('layouts.app')



@section('content')

<nav aria-label="breadcrumb">
<ol class="breadcrumb">
    
    <li class="breadcrumb-item"><a href="/">Inicio</a></li>
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
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="d_actividades" id="d_actividades"   value="{{ old('d_actividades') }}"></textarea>
                            
                        </div>
                        <div class=" row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label>Prestador:</label>
                                    <select class="form-control" name="prestador_id">
                                    @forelse($prestadores as $prestador)
                                        <option value="{{$prestador->id}}">{{$prestador->nombre}}</option>
                                        @empty
                                        <option disable>Sin aspirantes</option>
                                    @endforelse
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label>Responsable:</label>
                                    <select class="form-control" name="responsable_id">
                                    @forelse($responsables as $responsable)
                                    <option value="{{$responsable->id}}">{{$responsable->nombre}}</option>
                                        
                                    @empty
                                        
                                    @endforelse ($responsables as $responsable)
                                        
                                    
                                    </select>
                                </div>
                            </div>
                        </div>
                       
                       

                        {{--<div class="form-group">
                            <label>Carta:</label>
                            <select name="carta_id">
                            @forelse($cartas as $carta)
                                <option value="{{$carta->id}}">{{$usuarios->carta}}</option>
                                @empty
                                <option disable>Sin aspirantes</option>
                            @endforelse
                            </select>
                        </div> --}} 

                        <input type="submit" class="btn btn-primary" value="Guardar">
                    </form>
                </div>
            

            </div>
        </div>
    </div>
</div>

@endsection