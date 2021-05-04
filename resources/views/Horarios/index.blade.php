@extends('layouts.app')



@section('content')


<div class="card-body">
  <div>
    <table class="table table-hover"   >
      <thead>
        
      </thead>
      <tbody>
        <tr class="table table-sm table-bordered" >
          
          <th scope="row"class="bg-success ">Hora</th>
          <th scope="row"class="bg-success">Lunes</th>
          <th scope="row"class="bg-success">Martes</th>
          <th scope="row"class="bg-success">Miercoles</th>
          <th scope="row"class="bg-success">Jueves</th>
          <th scope="row"class="bg-success">Viernes</th>
        </tr>
        <tr class="table table-sm table-bordered" >
          <td >8 a.m. - 9 a.m.</td>
          <td id="celda">
            @foreach ($horarios as $horario)
            <ul class="list-group" id="ul">
              <li class="list-group-item">{{  $horario->dia}}</li>
             
            </ul>
            @endforeach
            
          </td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr class="table table-sm table-bordered" >
          <td>9 a.m. - 10 a.m. </td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr class="table table-sm table-bordered" >
          <td>10 a.m. - 11 a.m.</th>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr class="table table-sm table-bordered" > 
          <td >11 a.m. - 12 p.m. </th>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
      
        <tr class="table table-sm table-bordered" > 
          <td >12 p.m. - 1 p.m. </th>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
      
        <tr class="table table-sm table-bordered" > 
          <td >1 p.m. - 2 p.m. </th>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
      
        <tr class="table table-sm table-bordered" > 
          <td  >3 p.m. - 4 p.m. </th>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr class="table table-sm table-bordered" > 
          <td  >4 p.m. - 5 p.m. </th>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr class="table table-sm table-bordered" > 
          <td  > 5 p.m. - 6 p.m. </th>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr class="table table-sm table-bordered" > 
          <td  >6 p.m. - 7 p.m. </th>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr class="table table-sm table-bordered" > 
          <td  >7 p.m. - 8 p.m. </th>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr class="table table-sm table-bordered" > 
          <td  >8 p.m. - 9 p.m. </th>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
      
      
      </tbody>
    </table>
  
  </div>

  
</div>
</div>


<!-- Modal añadir -->
<div class="modal fade" id="modalID" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Evento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form action="/Horarios" method="post" id="formID">
          @csrf
          <!-- Dia -->
          <div class="form-outline mb-4">
            <label class="form-label" for="id">Dia</label>
            <input type="text" id="dia" name="dia" class="form-control" />
           
          </div>


          <!-- Proyecto 
          <div class="form-outline mb-4">
            <label class="form-label" for="proyecto_id">Proyecto</label>
            <input type="text" id="proyecto_id" name="proyecto_id" class="form-control" />
           
          </div>
          -->
          
   
         
        
        
          <!-- Submit button -->
          <div class="modal-footer">
        
            <button id="btnAgregar" name="btnAgregar"  type="submit" class="btn btn-success btn-sm">Agregar</button>
            <button id="btnModificar" class="btn btn-info btn-sm" >Modificar</button>
            <button id="btnCencelar" class="btn btn-warning btn-sm" data-dismiss="modal" >Cancelar</button>
            <button id="btnEliiminar" class="btn btn-danger btn-sm">Eliminar</button>
            
          </div>
          
        </form>
      </div>
     
    </div>
  </div>
</div>

<!-- Modal Editar -->
<div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Evento Editar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form  method="PUT" id="formEdit">
          @csrf
          @method('PUT')
          <!-- Dia -->
          <div class="form-outline mb-4">
            <label class="form-label" for="id">Dia</label>
            <input type="text" id="dia" name="dia" class="form-control" />
           
          </div>
          <!-- Proyecto 
          <div class="form-outline mb-4">
            <label class="form-label" for="proyecto_id">Proyecto</label>
            <input type="text" id="proyecto_id" name="proyecto_id" class="form-control" />
           
          </div>
          -->
          
   
         
        
        
          <!-- Submit button -->
          <div class="modal-footer"> 
        
            <button id="btnAgregar" name="btnAgregar"  type="submit" class="btn btn-success btn-sm">Actualizar</button>
            <button id="btnCencelar" class="btn btn-danger btn-sm" >Cancelar</button>
            
            
          </div>
          
        </form>
      </div>
     
    </div>
  </div>
</div>
<script>
  $(document).ready(function(){
    
    $('#btnModificar').click(function(){
      $('#modalEdit').modal();
      
    });
    
    $('#formEdit').on('submit',function(e){
      e.preventDefault();
      var id = $('#id').val();

      $.ajax({
        method: "PUT",
        url: "/Horarios"+id,
        data: $('#formEdit').serialize(),
        success: function(response){
          console.log(response)
          $('#modalEdit').modal('hide')
        
         
        },
        error: function(error){
          console.log(error)
        
          
         
        }
      });


   });
  });
</script>

   



<script type="text/javascript">
  $(document).ready(function(){



    $('#celda').click(function(){
      $('#modalID').modal();

    });




    $('#formID').on('submit',function(e){
      e.preventDefault();

      $.ajax({
        method: "POST",
        url: "/Horarios",
        data: $('#formID').serialize(),
        success: function(response){
          console.log(response)
          $('#modalID').modal('hide')
          location.reload();
         
        },
        error: function(error){
          console.log(error)
        
          
         
        }
      });
    });

    
  
    
  });
</script>





@endsection