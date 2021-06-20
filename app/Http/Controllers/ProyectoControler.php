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
    public function __construct()
    {
        $this->middleware('rol');
    }
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
        $proyectos = Proyecto::orderBy('id','desc')->where('activo',1)->paginate(1,['*'],'pag_proyectos',$pagina);
        $historicos = Proyecto::orderBy('id','desc')->where('activo',0)->paginate(1,['*'],'pag_proyectos_hist',$pagina_h);
        return view('Proyectos.index',compact('proyectos','historicos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proyectos = Proyecto::all();
        $usuarios = User::all();
        $prestadores = User::where("rol","Aspirante")->get();
        $responsables = User::where("rol","Auxiliar")->get();
        $cartas = User::where("carta")->get();
        return view('Proyectos.create',compact('usuarios','proyectos','prestadores','responsables','cartas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $proyecto = Proyecto::find($id);
        $usuarios = User::all();
        return view('Proyectos.edit',compact('proyecto','usuarios'));
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

    
        $registro = Proyecto::find($id);
        $registro->fill($valores);
        $registro->save();

        return redirect("/Proyectos")->with('mensaje','Proyecto modificado correctamente');
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
            $registro = Proyecto::find($id);
            $registro->delete();
            return redirect("/Proyectos")->with('mensaje','Proyecto modificado correctamente');
        }catch (\Illuminate\Database\QueryException $e) {
            return redirect("/Proyectos")->with('error',$e->getMessage());
        }
    }
}
