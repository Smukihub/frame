<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Horario;
use App\Models\Proyecto;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;


class HorarioControler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       $horarios = Horario::all();
       $proyectos = Proyecto::all();
       //$proyecto = 1;
       
        return view('Horarios.index',compact('proyectos','horarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $proyecto = Proyecto::all();
        $horarios = new Horarios();
        $horarios->x = $request->input('x');
        $horarios->y = $request->input('y');
        
        $horarios->save();
        return json_encode(["msg" => "usuario agregado"],compact('proyectos')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {      
        $registro = new Horario();
        $valores = $request->all();
        
        $registro->fill($valores);
        $registro->save();
        $arreglo=$registro->toArray;
        $registro['proyecto'] = $registro->proyecto->nombre;
        return json_encode(["msg" => "Horario agregado", "registro" => $registro]); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
     $datosEvento = Horario::all();
     return response()->json($datosEvento);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
 

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $horarios = $request->all();

       
        $horarios = Horario::find($id);
       
        $horarios->save();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {

        $registro = Horario::where('dia',$request->dia)->where('hora',$request->hora)->get();       
        Horario::where('dia',$request->dia)->where('hora',$request->hora)->delete();       
        
        return json_encode(["msg" => "Horario eliminado", "registro" => $registro]); 
    }
}
