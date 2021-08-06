<?php

use Illuminate\Database\Seeder;

class ProyectoSeeder extends Seeder
{
    /**
     * Ejecute la semilla de Proyecto de la base de datos.
     *
     * @return void
     */
    public function run()
    {
        DB::table('proyectos')->insert([
            'nombre' => "Proyecto1",
            'd_actividades' => "Proyecto web" ,
            'activo' => 1 ,
            'prestador_id' => "6" ,
            'responsable_id' => "2" ,
            'total' => 8,
            
            //'carta_id' => "" ,
           // 'iniciales' =>"SFL",
        
        ]);
        DB::table('proyectos')->insert([
            'nombre' => "Proyecto2",
            'd_actividades' => "Proyecto web" ,
            'activo' => 1 ,
            'prestador_id' => "7" ,
            'responsable_id' => "2" ,
            'total' => 9,
            
            //'cuentas' => 300,
            //'carta_id' => "" ,
            //'iniciales' =>"SFL",
        ]);
        DB::table('proyectos')->insert([
            'nombre' => "Proyecto3",
            'd_actividades' => "Proyecto web" ,
            'activo' => 1 ,
            'prestador_id' => "8" ,
            'responsable_id' => "3" ,
            'total' => 5,
         
            
            //'cuentas' => 120,
            //'carta_id' => "" ,
            //'iniciales' =>"SFL",
        ]);
        DB::table('proyectos')->insert([
            'nombre' => "Proyecto4",
            'd_actividades' => "Proyecto web" ,
            'activo' => 1 ,
            'prestador_id' => "9" ,
            'responsable_id' => "3" ,
            'total' => 5,
           
            //'cuentas' => 100,
            //'carta_id' => "" ,
            //'iniciales' =>"SFL",
        ]);
        DB::table('proyectos')->insert([
            'nombre' => "Proyecto5",
            'd_actividades' => "Proyecto web" ,
            'activo' => 1 ,
            'prestador_id' => "10" ,
            'responsable_id' => "4" ,
            'total' => 7,
          
            //'cuentas' => 350,
            //'carta_id' => "" ,
            //'iniciales' =>"SFL",
        ]);
        DB::table('proyectos')->insert([
            'nombre' => "Proyecto6",
            'd_actividades' => "Proyecto web" ,
            'activo' => 1 ,
            'prestador_id' => "11" ,
            'responsable_id' => "4" ,
            'total' => 5,
         
            //'cuentas' => 100,
            //'carta_id' => "" ,
            //'iniciales' =>"SFL",
        ]);
        DB::table('proyectos')->insert([
            'nombre' => "Proyecto7",
            'd_actividades' => "Proyecto Web" ,
            'activo' => 0 ,
            'prestador_id' => "12" ,
            'responsable_id' => "5" ,
            'total' => 5,
          
            //'cuentas' => 100,
            //'carta_id' => "" ,
            //'iniciales' =>"SFL",
            
        ]);
        DB::table('proyectos')->insert([
            'nombre' => "Proyecto8",
            'd_actividades' => "Proyecto web" ,
            'activo' => 0 ,
            'prestador_id' => "13" ,
            'responsable_id' => "5" ,
            'total' => 5,
          
            //'cuentas' => 100,
            //'carta_id' => "" ,
            //'iniciales' =>"SFL",
        ]);
    }
}
