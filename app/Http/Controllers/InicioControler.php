<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Proyecto;
use App\Models\Horario;

class InicioControler extends Controller
{
    
    public function inicio(){
       
        return view('welcome' );
    }
    public function tablero(){
        
        if (is_null(Auth::user())) die;

        switch (Auth::user()->rol) {
            case 'Jefe':
                $usuarios = User::all();
                $proyectos = Proyecto::all();
                $horarios = Horario::all();
              
                return  view('tablero',compact('usuarios','proyectos','horarios'));
                break;
            case 'Prestador':
                $usuarios = User::all();
                $proyectos = Proyecto::all();
              
                return  view('tablero',compact('usuarios','proyectos'));
                break;
            case 'Auxiliar':
                $usuarios = User::all();
                $proyectos = Proyecto::all();
                return  view('tablero',compact('usuarios','proyectos'));
                break;
            case 'Externo':
                $usuarios = User::all();
                $proyectos = Proyecto::all();
               return  view('tablero',compact('usuarios','proyectos'));
                break;
            case 'Aspirante':
                $usuarios = User::all();
                $proyectos = Proyecto::all();
                return view('tablero',compact('usuarios','proyectos'));
            default:
                return view('tablero',compact('usuarios','proyectos'));
                break;
        }
    }
}
