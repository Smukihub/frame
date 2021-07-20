<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
 

<title>Lista de Usuarios</title>
</head>
<body>
    <header>
        <div class="row">
            <div class="col">
                <img  class="rounded float-left" width="100px" height="100px" src="{{ asset('images/logo.png') }}">
            </div>
            
            <div class="col">
                <img  class="rounded float-right"  width="100px" height="100px" src="{{ asset('images/logo_isc.jpg') }}">
            </div>
          </div>
    </header>
 

    <div class="row justify-content-center">
        <h2 class="text-center">Lista de Usuarios</h2>
        <div class="col-md-8">
            <div class="card-body">
                
                <hr style="clear:both">
                <table class="table table-bordered">
                    <thead class="thead-dark">
                      <tr>
                        
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Tipo</th>
                        
                  
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($usuario as $usuario)
                        <tr id="{{$usuario->id}}">
                            <td>{{$usuario->nombre}} {{$usuario->apellido_paterno}} {{$usuario->apellido_paterno}}</td>                
                            <td  data-original="{{$usuario->apellido}}">{{$usuario->apellido}}</td>
                            <td  data-original="{{$usuario->rol}}">{{$usuario->rol}}</td>
                           
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3">Sin usuarios registrados</td>
                        </tr>
                    @endforelse
                </tbody> 
                        
                      </tr>
                      
                    </tbody>
                  </table>        
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

 



