<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Historico extends Model
{

    /**Modelo - Historico
     * Rellena la tabla de Historico de la base de datos
     *
     *
     */
    public $timestamps = false;
    protected $fillable = ['fecha','dia','hora','tipo','actv','horares','justi','cuantas','proyecto_id'];
    
    /**
     * Relacion hasOne entre el modelo Historico y Proyecto
     */
    public function proyecto(){
        return $this->hasOne('App\Models\Proyecto','id','proyecto_id');
    }
    /**
     * Horas
     */
    public function horaVisible()
    {
        return ($this->hora+8) . " a " . ($this->hora+9);
    }

}
