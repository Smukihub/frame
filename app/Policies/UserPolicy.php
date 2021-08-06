<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Proyecto;

use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determina si el usuario puede ver el modelo ProyecUserto.
     */
    public function view(User $user)
    {
        return $user->id === $proyecto->responsable_id;
    }

}
