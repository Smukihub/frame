<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHorariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horarios', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title',255);
            $table->string('color',255);
            $table->string('textColor',20);
            $table->text('descripcion',20);
           //$table->tinyInteger('estado')->default(1);
            $table->dateTime('start');
            $table->dateTime('end');
           // $table->foreignId('proyecto_id')
            //->references('id')->on('proyectos');
            
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('horarios');
    }
}
