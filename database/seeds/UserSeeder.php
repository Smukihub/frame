<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'nombre' => "Mario Alberto",
            'apellido' => "Cortez Verde" ,
            'telefono' => "9612776642" ,
            'email' => "smoke_07@live.com" ,
            'password' => Hash::make("mario1997") ,
            'numcontrol' => 15270720 ,
            'path' => 'user.png' ,
            'activo' => 1 ,
            'status' => 0 ,
            'rol' => "Jefe"  ,
        ]);
        DB::table('users')->insert([
            'nombre' => "Aux1",
            'apellido' => "Hernandez" ,
            'telefono' => "9612445523" ,
            'email' => "aux1@live.com" ,
            'password' => Hash::make("12345678") ,
            'numcontrol' => 162434520 ,
            'path' => 'user.png' ,
            'activo' => 1 ,
            'status' => 0 ,
            'rol' => "Auxiliar"  ,
        ]);
        DB::table('users')->insert([
            'nombre' => "Aux2",
            'apellido' => "Perez" ,
            'telefono' => "9612445523" ,
            'email' => "aux2@live.com" ,
            'password' => Hash::make("12345678") ,
            'numcontrol' => 162434520 ,
            'path' => 'user.png' ,
            'activo' => 1 ,
            'status' => 0 ,
            'rol' => "Auxiliar"  ,
        ]);
        
        DB::table('users')->insert([
            'nombre' => "Aux3",
            'apellido' => "Lopez" ,
            'telefono' => "9612445523" ,
            'email' => "aux3@live.com" ,
            'password' => Hash::make("12345678") ,
            'numcontrol' => 162434520 ,
            'path' => 'user.png' ,
            'activo' => 1 ,
            'status' => 0 ,
            'rol' => "Auxiliar"  ,
        ]);
        
        DB::table('users')->insert([
            'nombre' => "Aux4",
            'apellido' => "Gomez" ,
            'telefono' => "9612445523" ,
            'email' => "aux4@live.com" ,
            'password' => Hash::make("12345678") ,
            'numcontrol' => 162434520 ,
            'path' => 'user.png' ,
            'activo' => 1 ,
            'status' => 0 ,
            'rol' => "Auxiliar"  ,
        ]);
        
        DB::table('users')->insert([
            'nombre' => "Prestador1",
            'apellido' => "Flores" ,
            'telefono' => "961774412" ,
            'email' => "prestador1@live.com" ,
            'password' =>  Hash::make("12345678") ,
            'numcontrol' => 182434520 ,
            'path' => 'user.png' ,
            'activo' => 1 ,
            'status' => 0 ,
            'rol' => "Prestador"  ,
        ]);
        DB::table('users')->insert([
            'nombre' => "Prestador2",
            'apellido' => "Prestador2" ,
            'telefono' => "961774412" ,
            'email' => "prestador2@live.com" ,
            'password' =>  Hash::make("12345678") ,
            'numcontrol' => 182434520 ,
            'path' => 'user.png' ,
            'activo' => 1 ,
            'status' => 0 ,
            'rol' => "Prestador"  ,
        ]);
        DB::table('users')->insert([
            'nombre' => "Prestador3",
            'apellido' => "Prestador3" ,
            'telefono' => "961774412" ,
            'email' => "prestador3@live.com" ,
            'password' =>  Hash::make("12345678") ,
            'numcontrol' => 182434520 ,
            'path' => 'user.png' ,
            'activo' => 1 ,
            'status' => 0 ,
            'rol' => "Prestador"  ,
        ]);
        DB::table('users')->insert([
            'nombre' => "Prestador4",
            'apellido' => "Prestador4" ,
            'telefono' => "961774412" ,
            'email' => "prestador4@live.com" ,
            'password' =>  Hash::make("12345678") ,
            'numcontrol' => 182434520 ,
            'path' => 'user.png' ,
            'activo' => 1 ,
            'status' => 0 ,
            'rol' => "Prestador"  ,
        ]);
        DB::table('users')->insert([
            'nombre' => "Prestador5",
            'apellido' => "Prestador5" ,
            'telefono' => "961774412" ,
            'email' => "prestador5@live.com" ,
            'password' =>  Hash::make("12345678") ,
            'numcontrol' => 182434520 ,
            'path' => 'user.png' ,
            'activo' => 1 ,
            'status' => 0 ,
            'rol' => "Prestador"  ,
        ]);
        DB::table('users')->insert([
            'nombre' => "Prestador6",
            'apellido' => "Prestador6" ,
            'telefono' => "961774412" ,
            'email' => "prestador6@live.com" ,
            'password' =>  Hash::make("12345678") ,
            'numcontrol' => 182434520 ,
            'path' => 'user.png' ,
            'activo' => 1 ,
            'status' => 0 ,
            'rol' => "Prestador"  ,
        ]);
        DB::table('users')->insert([
            'nombre' => "Prestador7",
            'apellido' => "Prestador7" ,
            'telefono' => "961774412" ,
            'email' => "prestador7@live.com" ,
            'password' =>  Hash::make("12345678") ,
            'numcontrol' => 182434520 ,
            'path' => 'user.png' ,
            'activo' => 1 ,
            'status' => 0 ,
            'rol' => "Prestador"  ,
        ]);
        DB::table('users')->insert([
            'nombre' => "Prestador8",
            'apellido' => "Prestador8" ,
            'telefono' => "961774412" ,
            'email' => "prestador8@live.com" ,
            'password' =>  Hash::make("12345678") ,
            'numcontrol' => 182434520 ,
            'path' => 'user.png' ,
            'activo' => 1 ,
            'status' => 0 ,
            'rol' => "Prestador"  ,
        ]);


        DB::table('users')->insert([
            'nombre' => "Sein",
            'apellido' => "Ozuna" ,
            'telefono' => "9616674412" ,
            'email' => "sein@live.com" ,
            'password' => Hash::make("12345678") ,
            'numcontrol' => 172434520 ,
            'path' => 'user.png' ,
            'activo' => 1 ,
            'status' => 0 ,
            'rol' => "Externo"  ,
        ]);



        DB::table('users')->insert([
            'nombre' => "Luis",
            'apellido' => "Gomez Verde" ,
            'telefono' => "9612776642" ,
            'email' => "luia@live.com" ,
            'password' => Hash::make("mario1997") ,
            'numcontrol' => 15270720 ,
            'path' => 'user.png' ,
            'activo' => 1 ,
            'status' => 0 ,
            'rol' => "Aspirante"  ,
        ]);
    
    }
}
