<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyecto;
use App\Models\Horario;


class VerControler extends Controller
{
    public function ver($proyecto_id){
        $proyecto = Proyecto::find($proyecto_id);
        $horarios = Horario::all();

        if (is_null($proyecto)){
            $horarios = array();
            $mensaje = "Proyecto no encontrada";
        }else{
            
            $mensaje = "Proyecto: " . $proyecto->nombre;
        }
        $pro = "";
        return view('ver',compact('mensaje','horarios','pro'));
    }
}
