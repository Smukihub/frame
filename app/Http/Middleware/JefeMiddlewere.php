<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;

class JefeMiddlewere
{
    /**
     * Obtenga la ruta a la que se debe redirigir al usuario cuando no esté autenticado,
     * verifica si el usuario es especificamente tipo Jefe.
     *
     *
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->rol=='Jefe' ) 
            return $next($request);
            
                else
                {
                    return redirect('/');
                }
            
    }
}
