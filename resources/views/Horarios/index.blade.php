@extends('layouts.app')



@section('content') 
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
          <th>8 a.m. - 9 a.m.</th>
<<<<<<< HEAD
          <td data-id="${registro.id}"></td>
=======
          <td></td>
>>>>>>> 0d04b85c2687fd1bb940490b55abc82c061cc119
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr aria-hora ="9" >
          <th>9 a.m. - 10 a.m. </th>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr aria-hora ="10">
          <th>10 a.m. - 11 a.m.</th>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr class="table table-sm table-bordered" > 
          <th >11 a.m. - 12 p.m. </th>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
      
        <tr class="table table-sm table-bordered" > 
          <th >12 p.m. - 1 p.m. </th>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
      
        <tr class="table table-sm table-bordered" > 
          <th >1 p.m. - 2 p.m. </th>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
      
        <tr class="table table-sm table-bordered" > 
          <th  >3 p.m. - 4 p.m. </th>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr class="table table-sm table-bordered" > 
          <th  >4 p.m. - 5 p.m. </th>
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
          <th  >6 p.m. - 7 p.m. </th>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr class="table table-sm table-bordered" > 
          <th  >7 p.m. - 8 p.m. </th>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr class="table table-sm table-bordered" > 
          <th >8 p.m. - 9 p.m. </th>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>     
      </tbody>
    </table>
  </div>
<<<<<<< HEAD
</div>
</div>
=======
</div>
</div>
>>>>>>> 0d04b85c2687fd1bb940490b55abc82c061cc119


<script>
  tbl  =  document.getElementById("tbl-horario").addEventListener('click',event => {
    
    if (event.target.tagName === 'TD') {
<<<<<<< HEAD
      
      let obj = { 
        _token: '{{ csrf_token() }}',
        dia :event.target.cellIndex,
        hora : event.target.parentElement.rowIndex,
        proyecto_id:'1',
      };
      
      
      ocupado = event.target.innerText;
      if (ocupado) {
        console.log('remover de la base de datos');
        console.log(event.target.dataset.id);
        let id = event.target.dataset.id;
        fetch('/Horarios/${id}', {
      method: 'DELETE',
    })
    .then(res => res.json())
      

      }else {
        fetch('/Horarios', {
          method: 'POST',
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify(obj)
        })
        .then(response => response.json())
        .then(res=> {
          hora= res.registro.hora;
          dia = res.registro.dia;
          nombre = res.registro.proyecto.nombre;
          tabla = document.getElementById("tbl-horario");
          document.getElementById("tbl-horario").rows[hora].children[dia].innerText=nombre;
          x=1;
          console.log("pintar en dia: " + res.registro.x + " con hora " + res.registro.y + "para el proyecto")
          x++;
        });
      }
        
     
      
      
      
    }
  });
  
  
=======
      
      let obj = { 
        _token: '{{ csrf_token() }}',
        dia :event.target.cellIndex,
        hora : event.target.parentElement.rowIndex,
        proyecto_id:'1',
      };
      

      
      ocupado = event.target.innerText;
      if (ocupado) {
      }else {
        fetch('/Horarios', {
          method: 'POST',
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify(obj)
        })
        .then(response => response.json())
        .then(res=> {
          hora= res.registro.hora;
          dia = res.registro.dia;
          nombre = res.registro.proyecto.nombre;
          tabla = document.getElementById("tbl-horario");
          document.getElementById("tbl-horario").rows[hora].children[dia].innerText=nombre;
          x=1;
          console.log("pintar en dia: " + res.registro.x + " con hora " + res.registro.y + "para el proyecto")
          x++;
        });
      }
        

     

      
      
      
    }

  });
  

  

>>>>>>> 0d04b85c2687fd1bb940490b55abc82c061cc119
</script>
@endsection