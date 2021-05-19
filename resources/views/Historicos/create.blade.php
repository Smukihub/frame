@extends('layouts.app')

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
  <div class="container">
    <div class="card mb-4 shadow-sm">
      <div class="card-header">
        <h4 class="my-0 font-weight-normal">
          Asistencia
        </h4>
      </div>
      <div class="card-body">
      <form action="/Historicos" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group col-md-4">
          <label for="dia">Fecha:</label>
          <input type="date" class="form-control" name="dia" id="dia" min="2021-01-01" max="2021-12-31">
         
        </div>
        <div class="col-md-6">
          <div class="form-check">
            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
            <label class="form-check-label" for="exampleRadios1">
              Asistencia
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
            <label class="form-check-label" for="exampleRadios2">
              Falta
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3" value="option3" >
            <label class="form-check-label" for="exampleRadios3">
              Retardo
            </label>
          </div>
  
        </div>
   
        
        <div class="row col-md-6">
          <div class="col-md-6 mb-3">
            <label for="firstName">Hora de inicio</label>
            <input type="number" class="form-control" id="firstName" placeholder="" value="" required>
            
          </div>
          <div class="col-md-6 mb-3">
            <label for="lastName">Hora final</label>
            <input type="number" class="form-control" id="lastName" placeholder="" value="" required>
            
          </div>
        </div>
  
        <div class="col-md-2 mb-3">
          <label for="firstName">Total de horas:</label>
          <input type="number" class="form-control" id="firstName" placeholder="" value="" required>
  
          
          
        </div>
        <div class="form-group col-md-6">
          <label for="descripcion">Actividades realizadas</label>
          <textarea class="form-control" id="descripcion" rows="3" name="descripcion"></textarea>
        </div>
        <input type="submit" class="btn btn-primary" value="Guardar">
      </form>
     
  
  
     
     
  
@endsection