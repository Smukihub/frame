<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellido');
            $table->string('telefono');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('numcontrol');
            $table->string('path')->default('user.png');
            $table->tinyInteger('activo')->default(1);	
            $table->tinyInteger('status')->default(0);	
            $table->rememberToken();
            $table->timestamps();
            $table->enum('rol', ['Jefe', 'Auxiliar','Externo','Prestador','Aspirante'])->default('Aspirante');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
