<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Proyecto;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProyectoPolicy
{
    use HandlesAuthorization;

    /**
     * Determina si el usuario puede ver el modelo Proyecto.
     *
     * 
     */
 
    public function view(User $user, Proyecto $proyecto)
    {
        return $user->id === $proyecto->responsable_id || $user->id === $proyecto->prestador_id || $user->rol == "Jefe"  ;
    }

    /**
     *  Determina si el usuario puede crear registros en el modelo Proyecto.
     */
    public function create(User $user, Proyecto $proyectos)
    {
        return $user->rol == "Jefe"  ;
    }

   
}
