<?php

use Illuminate\Database\Seeder;

class ProyectoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('proyectos')->insert([
            'nombre' => "Estancias",
            'd_actividades' => "Proyecto web" ,
            'prestador_id' => "4" ,
            'responsable_id' => "2" ,
            'iniciales'=>"JFM",
        ]);
        DB::table('proyectos')->insert([
            'nombre' => "Titulacion",
            'd_actividades' => "Proyecto Web" ,
            'prestador_id' => "4" ,
            'responsable_id' => "2" ,
            
        ]);
        DB::table('proyectos')->insert([
            'nombre' => "Doctorado",
            'd_actividades' => "Proyecto web" ,
            'prestador_id' => "4" ,
            'responsable_id' => "2" ,
        ]);
    }
}
