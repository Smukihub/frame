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
            'nombre' => "Jose",
            'apellido' => "Hernandez" ,
            'telefono' => "9612445523" ,
            'email' => "jose@live.com" ,
            'password' => Hash::make("12345678") ,
            'numcontrol' => 162434520 ,
            'path' => 'user.png' ,
            'activo' => 1 ,
            'status' => 0 ,
            'rol' => "Auxiliar"  ,
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
            'nombre' => "Sergio",
            'apellido' => "Flores" ,
            'telefono' => "961774412" ,
            'email' => "sergio@live.com" ,
            'password' =>  Hash::make("12345678") ,
            'numcontrol' => 182434520 ,
            'path' => 'user.png' ,
            'activo' => 1 ,
            'status' => 0 ,
            'rol' => "Prestador"  ,
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
        DB::table('users')->insert([
            'nombre' => "Jose2",
            'apellido' => "Hernandez2" ,
            'telefono' => "9612445523" ,
            'email' => "jose2@live.com" ,
            'password' => Hash::make("12345678") ,
            'numcontrol' => 162434520 ,
            'path' => 'user.png' ,
            'activo' => 1 ,
            'status' => 0 ,
            'rol' => "Auxiliar"  ,
        ]);

    }
}
