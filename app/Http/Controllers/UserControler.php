<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Barryvdh\DomPDF\Facade as PDF;

use App\Models\User;

class UserControler extends Controller
{


    /*
    |--------------------------------------------------------------------------
    | Controlador Proyecto
    |--------------------------------------------------------------------------
    | Este controlador maneja el registro de 
    los usuarios, también cumple con la función de editar, 
    ver, actuliazar y borrar cada registro.
    | 
    |
  */

    public function __construct()
    {
        $this->middleware('jefe');
    }
   
    /**
     * Muestra una lista de los Usuarios.
     */
    public function index(Request $request)
    {
        $nombre = $request->get('buscar');
        //dd($nombre);
        $buscar = User::nombre($nombre)->apellido($nombre);

        //puede venir por request
        $pagina="";
        $pagina =$request->input('pag_usuarios', Session::get('pag_usuarios',1));
//        dd($pagina);
        Session::put('pag_usuarios',$pagina);
        


        $usuarios = User::orderBy('id','desc')->paginate(10,['*'],'pag_usuarios',$pagina);
        return view('Usuarios.index',compact('usuarios','buscar'));
    }


    /**
     * Muestre el formulario para crear un nuevo Usuario
     */
    public function create()
    {   
        return view('Usuarios.create');
    }

    /**
     * Guarda un Usuario recién creado en el almacenamiento.
     */
    public function store(Request $request)
    {
        $valores = $request->all();
        if ($valores['password']!=$valores['password2'])
            return redirect()->back()->with('error','El password no esta bien confirmado');

        $valores['password']=Hash::make( $valores['password'] );

        $imagen = $request->file('path');
        if(!is_null($imagen)){
            $ruta_destino = public_path('/storage/images/');
            $nombre_de_archivo = $imagen->getClientOriginalName();
            $imagen->move($ruta_destino, $nombre_de_archivo);
            $valores['path']=$nombre_de_archivo;
        }
        $carta = $request->file('carta');
        if(!is_null($carta)){
            $ruta_destino = public_carta('/storage/cartas/');
            $nombre_de_carta = $carta->getClientOriginalName();
            $carta->move($ruta_destino, $nombre_de_carta);
            $valores['carta']=$nombre_de_carta;
        }
        
        $registro = new User();
        $registro->fill($valores);
        $registro->save();

        return redirect("/Usuarios")->with('mensaje','Usuario agregado correctamente');


    }

    /**
     * Mostrar el Usuario especificado.
     */
    public function show($id)
    {
        $usuario = User::find($id);
        return view('Usuarios.show',compact('usuario'));


    }

    /**
     * Muestra el formulario para editar el Usuario especificado.
     */
    public function edit($id)
    {
        
        $usuario = User::find($id);
        return view('Usuarios.edit',compact('usuario'));
    }

    /**
     * Actualiza el Usuario especificado en el almacenamiento.
     */
    public function update(Request $request, $id)
    {
        $valores = $request->all();

        if(isset($valores['password2']))
            if ($valores['password']!=$valores['password2'])
                return redirect()->back()->with('error','El password no esta bien confirmado');


        if(isset($valores['password']))
        //si el password esta en blanco no lo actualizaremos
        if( is_null($valores['password']))
            unset($valores['password']);
        else
            $valores['password']=Hash::make( $valores['password'] );

            $imagen = $request->file('path');
            if(!is_null($imagen)){
                $ruta_destino = public_path('/storage/images/');
                $nombre_de_archivo = $imagen->getClientOriginalName();
                $imagen->move($ruta_destino, $nombre_de_archivo);
                $valores['path']=$nombre_de_archivo;
            }
            $carta = $request->file('carta');
            if(!is_null($carta)){
                $ruta_destino = public_path('/storage/cartas/');
                $nombre_de_archivo = $carta->getClientOriginalName();
                $carta->move($ruta_destino, $nombre_de_archivo);
                $valores['carta']=$nombre_de_archivo;
            }
    
         $registro = User::find($id);
         $registro->fill($valores);
         $registro->save();
    
      return redirect("/Usuarios")->with('mensaje','Usuario modificado correctamente');
    
    

    }

    /**
     * Elimina especificamente el Usuario deseado.    
     */
    public function destroy($id)
    {
        try {
            $registro = User::find($id);
            $registro->delete();
            return redirect("/Usuarios")->with('mensaje','Usuario modificado correctamente');
        }catch (\Illuminate\Database\QueryException $e) {
            return redirect("/Usuarios")->with('error',$e->getMessage());
        }
    }


    
    /*
     * Esta funcion es para poder exportar en pdf todos los Usuarios del almacenamiento.
     */
    public function exportPdf()
    {
        $usuario = User::get();
        $pdf = PDF::loadView('pdf.users', compact('usuario'));
        return $pdf->download('user-list.pdf');
    }

    /*
     * Esta funcion es para poder exportar en pdf un solo Usuario del almacenamiento.  
     */
    public function exportOnePdf($id)
    {
        $usuario = User::find($id);
        $pdf = PDF::loadView('pdf.user', compact('usuario'));
        return $pdf->download('usuario-pdf.pdf');
    }
}
