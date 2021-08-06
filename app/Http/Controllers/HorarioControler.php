<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Horario;
use App\Models\Proyecto;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;


class HorarioControler extends Controller
{


    /*
    |--------------------------------------------------------------------------
    | Controlador Horario
    |--------------------------------------------------------------------------
    | Este controlador maneja la vista del Horario General .
    | 
    |
    */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Muestra el horario general
     *
     * 
     */
    public function index()
    {

       $horarios = Horario::all();
       $proyectos = Proyecto::all();
       //$proyecto = 1;
       
        return view('Horarios.index',compact('proyectos','horarios'));
    }

     /**
     * Guarda un Horario recién creado en el almacenamiento.
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

}