<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Proyecto extends Model
{
    public $timestamps = false;
    protected $fillable = ['nombre','d_actividades','prestador_id','responsable_id'];

    public function prestador(){
        return $this->hasOne('App\Models\User','id','prestador_id');
    }
    public function responsable(){
        return $this->hasOne('App\Models\User','id','responsable_id');
    }


    public function horarios()
    {
        return $this->hasMany('App\Models\Horario');
    }

    public function historicos()
    {
        return $this->hasMany('App\Models\Historico');
    }
    
}
