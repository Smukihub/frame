<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyecto;
use App\Models\Horario;


class VerControler extends Controller
{
    public function ver($proyecto_id){
      
        $horarios = Horario::all();
        $proyecto = Proyecto::all();
        if (is_null($proyecto)){
            $horarios = array();
            $mensaje = "Proyecto no encontrada";
        }else{
            
           
        }
       
        return view('ver',compact('mensaje','horarios','proyectos'));
    }



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
