@extends('layouts.app')



@section('content')


<form>
  <div class="form-row">
   
  <div class="form-row">
  <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}"/>
    <div class="form-group col-md-4">
      <label for="x">Dia</label>
      <select id="x"  name="x" class="form-control">
      <option selected>Seleccione día</option>
        <option value="1">Lunes</option>
        <option value="2">Martes</option>
        <option value="3">Miercoles</option>
        <option value="4">Jueves</option>
        <option value="5">Viernes</option>
      </select>
    </div>
    <div class="form-group col-md-4">
      <label for="y">Hora</label>
      <select id="y" name="y" class="form-control">
      <option selected>Seleccione hora</option>
        <option value="0">8 a.m - 9 a.m</option>
        <option value="1">9 a.m - 10 a.m</option>
        <option value="2">10 a.m - 11 a.m</option>
        <option value="3">11 a.m - 12 p.m</option>
        <option value="4">12 p.m - 1 p.m</option>
        <option value="5">1 p.m - 2 p.m</option>
        <option value="6">2 p.m - 3 p.m</option>
        <option value="7">3 p.m - 4 p.m</option>
        <option value="8">4 p.m - 5 p.m</option>
        <option value="9">5 p.m - 6 p.m</option>
        <option value="10">6 p.m - 7 p.m</option>
        <option value="11">7 p.m - 8 p.m</option>
        <option value="12">8 p.m - 9 p.m</option>
      </select>

    </div>
    <div class="form-group col-md-6">
    <button onclick='agregar();' class="btn btn-primary " >Agregar</button>
    </div>
  
</form>


<div class="card-body">
  <div>
    <table class="table table-hover table-bordered"  id="tbl-horario" >
      <thead>
        <tr class="table table-sm table-bordered" >        
          <th scope="row"class="bg-success ">Hora</th>
          <th scope="row"class="bg-success">Lunes</th>
          <th scope="row"class="bg-success">Martes</th>
          <th scope="row"class="bg-success">Miercoles</th>
          <th scope="row"class="bg-success">Jueves</th>
          <th scope="row"class="bg-success">Viernes</th>
        </tr>        
      </thead>
      <tbody>
        <tr aria-hora ="8">
          <td >8 a.m. - 9 a.m.</td>
          <td id="celda">
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
      
  let x =  document.getElementById('x');
  let y =  document.getElementById('y');
  let _token =  document.getElementById('token');

 async function agregar(){
        let obj = { x:x.value, y:y.value};
        const res = await fetch('/Horarios', {
             method:'POST',
             mode: 'cors',
             headers:{
                   'X-CSRF-TOKEN': _token.value,
                   'Content-Type': 'application/json'
            },
            body:JSON.stringify(obj)      
            });
       
            const data = await res.json()
            console.log(data)
            clearInput()
  }
     

 
          

  $(document).ready(function(){
  




    //cargar horario que esta en la b.d.
    @foreach ($proyecto->horarios as $horario)
      $('#tbl-horario tbody')[0].rows[{{$horario->y}}].children[{{$horario->x}}].innerText="x";
    @endforeach

    $('#tbl-horario tbody').on('click' , 'td', function(){     
      hora = this.parentElement.getAttribute('aria-hora');
      dia = this.cellIndex;
      switch (dia) {
        case 1:
          diat = "lunes";
          break;
        case 2:
          diat = "martes";
          break;
        case 3:
          diat = "miercoles";
          break;
        case 4:
          diat = "jueves";
          break;
        case 5:
          diat = "viernes";
          break;
        default:
          return;
          break;
      }
        alert('dio click en: hora:' + hora + ', ' + diat );
      ocupado = this.innerText;
      if (ocupado) 
        alert('mandar a eliminar en la b.d.');
      else 
        alert('mandar a guardar en la b.d');

     })

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
    //usar javascript api fetch
    

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