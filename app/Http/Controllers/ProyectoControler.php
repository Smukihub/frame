<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Proyecto;
use App\Models\Historico;
use App\Models\User;
use Session;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ProyectoControler extends Controller
{
    

    /*
    |--------------------------------------------------------------------------
    | Controlador Proyecto
    |--------------------------------------------------------------------------
    | Este controlador maneja el registro de 
    los proyectos, también cumple con la función de editar, 
    ver, actuliazar y borrar cada registro.
    | 
    |
    */

    
    public function __construct()
    {
        $this->middleware('rol');
    }


    
    /**
     * Muestra una lista de los Proyectos.
     */
    public function index(Request $request)
    {
        
        //puede venir por request
        $pagina="";
        $pagina =$request->input('pag_proyectos', Session::get('pag_proyectos',1));
//        dd($pagina);
        Session::put('pag_proyectos',$pagina);
        $pagina_h="";
        $pagina_h =$request->input('pag_proyectos_hist', Session::get('pag_proyectos_hist',1));
//        dd($pagina);
        Session::put('pag_proyectos_hist',$pagina_h);
/*
        switch ($variable) {
            case 'value':
                # code...
                break;
            
            default:
                # code...
                break;
        }
*/
        $proyectos = Proyecto::orderBy('id','desc')->where('activo',1)->paginate(5,['*'],'pag_proyectos',$pagina);
        $historicos = Proyecto::orderBy('id','desc')->where('activo',0)->paginate(5,['*'],'pag_proyectos_hist',$pagina_h);
        return view('Proyectos.index',compact('proyectos','historicos'));
    }

    /**
     * Muestre el formulario para crear un nuevo Proyecto
     */
    public function create( Proyecto $proyectos)
    {
        $this->authorize('create', $proyectos);
        $proyectos = Proyecto::all();
        $usuarios = User::all();
        $prestadores = User::where("rol","Aspirante")->get();
        $responsables = User::where("rol","Auxiliar")->get();
        $cartas = User::where("carta")->get();
        //$uwus = User::select("numcontrol")->get();
        return view('Proyectos.create',compact('usuarios','proyectos','prestadores','responsables','cartas','uwus'));
    }

    /**
     * Guarda un Proyecto recién creado en el almacenamiento.
     */
    public function store(Request $request)
    {
        $request->validate([

            'nombre' => 'required|min:3|max:255',
            'd_actividades' => 'required|min:3|max:255'
        ]);
        $valores = $request->all();
        $id = $request->input('prestador_id');
        $usuario = User::find($id);
        $usuario->rol="Prestador";
        $usuario->save();

        
        $registro = new Proyecto();
        
        $registro->fill($valores);
        $registro->save();

        return redirect("/Proyectos")->with('mensaje','Proyecto agregado correctamente');
    
    }

   /**
     * Mostrar el Proyecto especificado.
     */
    public function show($id, Proyecto $proyecto)
    {
        
        $proyecto = Proyecto::find($id);
        $this->authorize('view', $proyecto);
        /* se debe de actualizar el juntas */
        $registros = Historico::where('proyecto_id', $proyecto->id)->where('tipo','<>','Falta')->get();
        
        $acumular = 0;
        foreach ($registros as $registro) {
            //dd($registro);
            //if( $registro->tipo == "Asistencia" ){
                $acumular+=$registro->juntas;
            //}
            
        }

        $proyecto->cuentas = $acumular;
        $proyecto->save();
		return view('Proyectos.show',compact('proyecto'));
    }

    /**
     * Muestra el formulario para editar el Proyecto especificado.
     */
    public function edit($id)
    {
        $proyecto = Proyecto::find($id);
        $usuarios = User::all();
        return view('Proyectos.edit',compact('proyecto','usuarios'));
    }

   /**
     * Actualiza el Proyecto especificado en el almacenamiento.
     */
    public function update(Request $request, $id)
    {
        $valores = $request->all();

    
        $registro = Proyecto::find($id);
        $registro->fill($valores);
        $registro->save();

        return redirect("/Proyectos")->with('mensaje','Proyecto modificado correctamente');
    }
    /**
     * Elimina especificamente el Usuario deseado.    
     */
    public function destroy($id)
    {
        try {
            $registro = Proyecto::find($id);
            $registro->delete();
            return redirect("/Proyectos")->with('mensaje','Proyecto modificado correctamente');
        }catch (\Illuminate\Database\QueryException $e) {
            return redirect("/Proyectos")->with('error',$e->getMessage());
        }
    }


}
