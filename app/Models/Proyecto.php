<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Proyecto extends Model
{
    public $timestamps = false;
    protected $fillable = ['x','y','proyecto_id'];

    public function users()
    {
        return $this->hasMany('App\Models\User'.'id','prestador_id','responsable_id');
    }
    public function horarios()
    {
        return $this->hasMany('App\Models\Horario');
    }
}
