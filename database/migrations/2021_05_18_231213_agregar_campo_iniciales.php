<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AgregarCampoIniciales extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //ALTER TABLE `proyectos` ADD `iniciales` VARCHAR(5) NULL AFTER `nombre`;
        
        Schema::table('proyectos', function (Blueprint $table) {
            $table->string('iniciales',5)->nullable()->after('nombre');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
