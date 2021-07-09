<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;

use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controlador
    |--------------------------------------------------------------------------
    | Este controlador maneja el registro de nuevos usuarios así como su
    | validación y creación. Por defecto, este controlador usa un rasgo para
    | proporcionar esta funcionalidad sin necesidad de ningún código adicional.
    | 
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nombre' => ['required', 'string', 'max:255', 'regex:/^[\pL\s\-]+$/u'],
            'apellido' => ['required', 'string', 'max:255', 'regex:/^[\pL\s\-]+$/u'],
            'telefono' => ['required', 'numeric', 'digits_between:6,10'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'numcontrol' => ['required', 'numeric', 'unique:users'],
            'rol'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */

    protected function create(array $data)
    {
        return User::create([
            'nombre' => $data['nombre'],
            'apellido' => $data['apellido'],
            'telefono' => $data['telefono'],
            'email' => $data['email'],
            'numcontrol' => $data['numcontrol'],
            'password' => Hash::make($data['password']),
            'activo' => $data['activo']=1,
            'status' => $data['status']=0,
            'rol' => $data['rol']="Aspirante",

            
        ]);
    }
    protected function register (Request $request)
    {
        $valores = $request->all();
        if ($valores['password']!=$valores['password2'])
            return redirect()->back()->with('error','El password no esta bien confirmado');

        $valores['password']=Hash::make( $valores['password'] );

        $imagen = $request->file('path');
        if(!is_null($imagen)){
            $ruta_destino = public_path('/storage/images/');
            $nombre_de_archivo = $imagen->getClientOriginalName();
            $imagen->move($ruta_destino, $nombre_de_archivo);
            $valores['path']=$nombre_de_archivo;
        }
        $carta = $request->file('carta');
        if(!is_null($carta)){
            $ruta_destino = public_carta('/storage/cartas/');
            $nombre_de_carta = $carta->getClientOriginalName();
            $carta->move($ruta_destino, $nombre_de_carta);
            $valores['carta']=$nombre_de_carta;
        }
        
        $registro = new User();
        $registro->fill($valores);
        $registro->save();

        return redirect("/")->with('mensaje','Usuario agregado correctamente');

        
    }




    
}
