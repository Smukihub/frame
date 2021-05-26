<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Historico;
use App\Models\Horario;
use App\Models\Proyecto;

class seguimientosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,$id )
    {
        $historicos = Historico::where('proyecto_id',$id)->get();
        return view('Historicos.index')->with('historicos',$historicos);
    }
    public function nuevo(Request $request,$id )
    {
        //horio del proyecto
        $historicos = Historico::all();
        $proyecto = Proyecto::find($id);       
        return view('Historicos.create',compact('proyecto','historicos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $registro = new Historico();
        $registro->fill($valores);
        $registro->save();



        return redirect("/seguimientos/{proyectos_id}")->with('mensaje','Historicos agregado correctamente');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
