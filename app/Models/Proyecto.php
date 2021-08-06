<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Proyecto extends Model
{
    /**Modelo - Proyecto
    * Rellena la tabla de Proyecto de la base de datos
     *
     *
     */

    public $timestamps = false;
    protected $fillable = ['nombre','d_actividades','prestador_id','responsable_id','total','cuentas','carta_id'];

     /*
     *  Relaciones hasOne entre el modelo Proyecto y User
     */
    public function prestador(){
        return $this->hasOne('App\Models\User','id','prestador_id');
    }
    public function responsable(){
        return $this->hasOne('App\Models\User','id','responsable_id');
    }

    /*
     *  Relaciones hasMany entre el modelo Proyecto y Horario
     */

    public function horarios()
    {
        return $this->hasMany('App\Models\Horario');
    }

     /*
     *  Relaciones hasMany entre el modelo Proyecto y Historico
     */

    public function historicos()
    {
        return $this->hasMany('App\Models\Historico');
    }
    
}
