<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;



class User extends Authenticatable
{

    /**Modelo - User
    * Rellena la tabla de User de la base de datos
     *
     *
     */

	use Notifiable;
	
    public $timestamps = false;
    protected $fillable = ['nombre','apellido','telefono','email', 'password','numcontrol','path','activo','status','rol','carta'];


    /*
     *  Relaciones hasMany entre el modelo User y Proyecto
     */
    public function proyectos(){
        return $this->hasMany('App\Models\Proyecto');
    }


    /*
     * Se usa para el filtro de búsqueda en la tabla User
     */
    public function scopeNombre($query, $nombre)
    {
        if($nombre)
        {
            return $query->where('nombre','like',"%nombre%");

        }

    }
    public function scopeApellido($query, $apellido)
    {
        if($apellido)
        {
            return $query->where('apellido','like',"%apellido%");

        }

    }
    
}
