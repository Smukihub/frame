<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyecto;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ProyectoControler extends Controller
{
    public function index()
    {
        $proyectos = Proyecto::orderBy('id','desc')->paginate(10);
        return view('Proyectos.index',compact('proyectos'));
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
        return view('Proyectos.create',compact('usuarios','proyectos','prestadores','responsables'));
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
    public function show($id)
    {
        
        $proyecto = Proyecto::find($id);
        return view('Proyectos.show',compact('proyecto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('rol');
    }
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
