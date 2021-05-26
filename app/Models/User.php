<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;



class User extends Authenticatable
{
	use Notifiable;
	
    public $timestamps = false;
    protected $fillable = ['nombre','apellido','telefono','email', 'password','numcontrol','path','activo','status','rol'];

    public function proyectos(){
        return $this->hasMany('App\Models\Proyecto');
    }
}
