<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Horario extends Model
{
    public $timestamps = false;
    protected $fillable = ['title','color','textcolor','descripcion','start','end'];


    public function proyecto(){
        return $this->hasMany('App\Models\Proyecto','id','proyecto_id');
    }

}
