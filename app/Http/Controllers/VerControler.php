<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyecto;
use App\Models\Horario;


class VerControler extends Controller
{
    public function ver($proyecto_id){
      
        
        $proyecto = Proyecto::find($proyecto_id);
              
        return view('ver',compact('proyecto'));
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
