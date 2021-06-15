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
    public function __construct()
    {
        $this->middleware('inicio');
    }
    public function inicio(){
        $usuarios = User::all();
        $proyectos = Proyecto::all();
        $horarios = Horario::all();
        return view('tablero',compact('usuarios','proyectos','horarios') );
    }
    public function tablero(){
        $user = Auth::user();
        if (is_null($user)) die;

        switch ($user->rol) {
            case 'Jefe':
                $usuarios = User::all();
                $proyectos = Proyecto::where('activo',1)->get();
                $historicos= Proyecto::where('activo',0)->get();
                $horarios = Horario::all();
                return  view('tablero',compact('usuarios','proyectos','horarios','historicos'));
                break;
            case 'Prestador':
                $usuarios = User::all();
                $proyectos = Proyecto::where('prestador_id',$user->id)->get();
                return redirect('/Proyectos')->with('usuarios','proyectos');
                break;
            case 'Auxiliar':
                $usuarios = User::all();
                $proyectos = Proyecto::where('responsable_id',$user->id)->get();
                return redirect('/Proyectos')->with('usuarios','proyectos');
                break;
            case 'Externo':
                $usuarios = User::all();
                $proyectos = Proyecto::all();
                $horarios = Horario::all();
                return  view('tablero',compact('usuarios','proyectos','horarios'));
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
