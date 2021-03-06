<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoricosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historicos', function (Blueprint $table) {
            $table->id();
            
            $table->date('fecha');
            $table->enum('dia', ['Lunes', 'Martes','Miercoles','Jueves','Viernes'])->nullable();
            $table->integer('hora');
            $table->enum('tipo', ['Asistencia', 'Retardo','Falta']);
            $table->time('horares')->nullable();
            $table->integer('juntas')->default(0);
            $table->string('actv')->nullable();
            $table->string('justi')->nullable();
            $table->foreignId('proyecto_id')->references('id')->on('proyectos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('historicos');
    }
}
