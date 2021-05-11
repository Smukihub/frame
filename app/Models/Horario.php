<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Horario extends Model
{
    public $timestamps = false;
    protected $fillable = ['dia','hora','proyecto_id'];


    public function proyecto(){
        return $this->hasOne('App\Models\Proyecto','id','proyecto_id');
    }

}
