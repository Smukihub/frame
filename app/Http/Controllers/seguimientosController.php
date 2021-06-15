<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
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

        $fecha = $request->get('buscar');
        //dd($fecha);
        $historico = Historico::where('fecha','like',"%fecha%");

        $ordenado = "";
        $valores = $request->all();
        foreach ($valores as $orden => $value) {
            if($value != "") {
                $ordenado = $orden;
                break;
            }
        }
        //dd($ordenado);
        switch ($ordenado) {
            case 'oAF':
                $historico = Historico::where('proyecto_id',$id)->orderBy('fecha','asc')->get();
                break;
            case 'oDF':
                $historico = Historico::where('proyecto_id',$id)->orderBy('fecha','desc')->get();
                break;            
            case 'oAH':
                $historico = Historico::where('proyecto_id',$id)->orderBy('hora','asc')->get();
                break;            
            case 'oDH':
                $historico = Historico::where('proyecto_id',$id)->orderBy('hora','desc')->get();
                break;            
            case 'oAD':
                $historico = Historico::where('proyecto_id',$id)->orderBy('dia','asc')->get();
                break;            
            case 'oDD':
                $historico = Historico::where('proyecto_id',$id)->orderBy('dia','desc')->get();
                break;            
            case 'oAT':
                $historico = Historico::where('proyecto_id',$id)->orderBy('tipo','asc')->get();
                break;            
            case 'oDT':
                $historico = Historico::where('proyecto_id',$id)->orderBy('tipo','desc')->get();
                break;            

            default:
                $historico = Historico::where('proyecto_id',$id)->get();
                break;
        }
        
        // si viene oAF
        // si viene oDF

        
        $proyecto = Proyecto::find($id);  
        return view('Historicos.index',compact('proyecto','historico'));
    }
    public function nuevo(Request $request,$id )
    {
        //horio del proyecto
        
        $proyecto = Proyecto::find($id);       
        return view('Historicos.create',compact('proyecto'));
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
    public function store(Request $request, $id)
    {
        $valores = $request->all();
        $fecha = $valores['fecha']; // $request->input('fecha'); // "2021-06-01";
        // "01/06/2021" '06/01/2021'
    
        
        $valores['dia'] = date("N",strtotime($fecha));
        switch ($valores['dia']) {
            case '1':
                $valores['dia']="Lunes";
                break;
            case '2':
                $valores['dia']="Martes";
                break;
            case '3':
                $valores['dia']="Miercoles";
                break;
            case '4':
                $valores['dia']="Jueves";
                break;
            case '5':
                $valores['dia']="Viernes";
                break;
            case '6':
                $valores['dia']="Sabado";
                break;
            default :
                $valores['dia']="Domingo";
                break;

        }
        //dd($valores['dia']);
        $registro = new Historico();
        $proyecto = Proyecto::find($id);
        $valores['proyecto_id']=$id;                
        $registro->fill($valores);
        $registro->save();

        return redirect("/Proyectos")->with('mensaje','Historico agregado correctamente');
    

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {


        $historico = Historico::find($id);  
        return view('Historicos.show',compact('historico'));
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
        try {
            $registro = Historico::find($id);
            $registro->delete();
            return redirect()->back();
        }catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back();
        }
    }
}
