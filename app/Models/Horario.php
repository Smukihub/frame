<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Horario extends Model
{
     /**Modelo - Horario
     * Rellena la tabla de Horario de la base de datos
     *
     *
     */
    public $timestamps = false;
    protected $fillable = ['dia','hora','proyecto_id'];

     /*
     *  Relacion hasOne entre el modelo Horario y Proyecto
     */
    public function proyecto(){
        return $this->hasOne('App\Models\Proyecto','id','proyecto_id');
    }

}
