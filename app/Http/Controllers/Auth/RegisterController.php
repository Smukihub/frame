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




    
}
