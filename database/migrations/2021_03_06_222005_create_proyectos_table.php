<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProyectosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyectos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('d_actividades');
            $table->tinyInteger('activo')->default(1);
            $table->foreignId('prestador_id')
            ->references('id')
            ->on('users');
            $table->foreignId('responsable_id')
            ->references('id')
            ->on('users');
            //$table->foreignId('carta_id')
            //->references('id')
            //->on('users')->nullable();
            $table->integer('total')->nullable();
            $table->integer('cuentas')->default(0);
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proyectos');
    }
}
