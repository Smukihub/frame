@extends('layouts.app')


  @section('scripts')
  <link rel="stylesheet" href="{{ asset('fullcalender/core/main.css')}}">
  <link rel="stylesheet" href="{{ asset('fullcalender/daygrid/main.css')}}">
  <link rel="stylesheet" href="{{ asset('fullcalender/list/main.css')}}">
  <link rel="stylesheet" href="{{ asset('fullcalender/timegrid/main.css')}}">
  





  <script src="{{ asset('fullcalender/core/main.js')}}"></script>
  <script src="{{ asset('fullcalender/interaction/main.js')}}"></script>
  <script src="{{ asset('fullcalender/daygrid/main.js')}}"></script>
  <script src="{{ asset('fullcalender/list/main.js')}}"></script>
  <script src="{{ asset('fullcalender/timegrid/main.js')}}"></script>
  <script src="{{ asset('fullcalender/core/locales/es.js')}}"></script>


  <script>
   document.addEventListener('DOMContentLoaded', function() {
      var calendarEl = document.getElementById('calendar');
      
      var calendar = new FullCalendar.Calendar(calendarEl, {
        locale:'es',
        plugins: [ 'interaction', 'dayGrid', 'timeGrid' ],
        header: {
          left: 'prev,next today Miboton',
          center: 'title',
          right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        customButtons:{
          Miboton:{
            text:"Botón",
            click:function(){
              alert("uwu");
              $('#exampleModal').modal('toggle');
            }
          }
        },
        dateClick:function(info){
          $('#fecha').val(info.dateStr);
          $('#exampleModal').modal();
          console.log(info);
          
        
        },

        eventClick:function(info)
        {
          console.log(info)
          console.log(info.event.title);
          console.log(info.event.start);
          console.log(info.event.end);


          $('#id').val(info.event.id);
          $('#title').val(info.event.title);
          $('#color').val(info.event.backgroundcolor);
          //$('#textColor').val(info.event.id);
          $('#descripcion').val(info.event.extendedProps.descripcion);
          $('#fecha').val(info.event.start);
          $('#hora').val(info.event.start);

          $('#exampleModal').modal();
          console.log(info);

        },
        events:"{{ url('/Horarios/show')}}"
      });
      calendar.render();
      $('#btnAgregar').click(function(){
        ObjEvento = recolectarDatosGUI("POST");
        EnviarInformacion('',ObjEvento);
      });
      function recolectarDatosGUI(method)
        {
          nuevoEvento ={
            id:$('#id').val(),
            title:$('#title').val(),
            color:$('#color').val(),
            textColor:'#FFFFFF',
            descripcion:$('#descripcion').val(),
            start:$('#fecha').val()+" "+$('#hora').val(),
            end:$('#fecha').val()+" "+$('#hora').val(),
            '_token':$("meta[name='csrf-token']").attr("content"),
            '_method':method	

          }
          return (nuevoEvento);
        }

        function EnviarInformacion(accion,objEvento)
          {
            $.ajax(
              {
              type:"POST",
              url:"{{ url('/Horarios') }}"+accion,
              data:objEvento,
              success:function(msg){ console.log(msg);},
              error:function(){ alert("Hay un Error");}
              }
            );
          }

    });


  </script>


  @endsection

 

@section('content')


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Evento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <!-- title id -->
          <div class="form-outline mb-4">
            <label class="form-label" for="id">ID</label>
            <input type="text" id="id" name="id" class="form-control" />
           
          </div>
          <!-- title input -->
          <div class="form-outline mb-4">
            <label class="form-label" for="title">Titulo</label>
            <input type="text" id="title" name="title" class="form-control" />
           
          </div>
          
          <div class="row">
            <div class="col">
              <!-- Fecha input -->
              <div class="form-outline mb-4">
                <label class="form-label" for="fecha">Fecha</label>
                <input type="text" id="fecha" name="fecha" class="form-control" />
              </div>
            </div>
            <div class="col">
              <!-- Hora input -->
              <div class="form-outline mb-4">
                <label class="form-label" for="hora">Hora</label>
                <input type="text" id="hora" name="hora" class="form-control" />
              </div>
            </div>
          </div>
         
         
        
          <!-- Descripcion input -->
          <div class="form-outline mb-4">
            <label class="form-label" for="descripcion">Descripción</label>
            <textarea class="form-control" name="descripcion" id="descripcion" rows="4"></textarea>
          </div>
          
            <!-- Colo input -->
            <div class="form-outline mb-4">
              <label class="form-label" for="color">Color</label>
              <input type="color" id="color" name="clor" class="form-control" />
            </div>
        
         
        
        
          <!-- Submit button -->
          
        </form>
      </div>
      <div class="modal-footer">
        
        <button id="btnAgregar"  type="submit" class="btn btn-success btn-sm">Agregar</button>
        <button id="btnModificar" class="btn btn-info btn-sm" >Modificar</button>
        <button id="btnCencelar" class="btn btn-warning btn-sm" >Cancelar</button>
        <button id="btnEliiminar" class="btn btn-danger btn-sm">Eliminar</button>
        
      </div>
    </div>
  </div>
</div>


<div class="row">
  <div class="col"></div>
  <div class="col-7">
    <div id="calendar"></div>
  </div>
  <div class="col"></div>
</div>



@endsection