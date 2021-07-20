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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('jefe');
    }
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
        


        $usuarios = User::orderBy('id','desc')->paginate(2,['*'],'pag_usuarios',$pagina);
        return view('Usuarios.index',compact('usuarios','buscar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        return view('Usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuario = User::find($id);
        return view('Usuarios.show',compact('usuario'));


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $usuario = User::find($id);
        return view('Usuarios.edit',compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
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


    
    /**
     * Esta funcion es para poder exportar en pdf todos los datos de la tabla .
 
     */
    public function exportPdf()
    {
        $usuario = User::get();
        $pdf = PDF::loadView('pdf.users', compact('usuario'));
        return $pdf->download('user-list.pdf');
    }

        /**
     * Esta funcion es para poder exportar en pdf un solo registro de la tabla de la base de datos 
     * 
     * Me salió el error de Trying to get property 'nombre' of non-object
     * Mi duda es si es la forma en la que declaro el "$usario" o en que.
 
     */
    public function exportOnePdf($id)
    {
        $usuario = User::find($id);
        $pdf = PDF::loadView('pdf.user', compact('usuario'));
        return $pdf->download('usuario-pdf/{Usuario}');
    }
}
