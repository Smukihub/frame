<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;

class RolMiddlewere
{
    /**
     * Obtiene la ruta a la que se debe redirigir al usuario cuando no esté autenticado,
     * verifica si el usuario es especificamente entre tipo Jefe, Auxiliar y Prestador.
     *
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->rol=='Jefe' ) 
            return $next($request);
            if (Auth::check() && Auth::user()->rol=='Auxiliar')
                return $next($request);
                    if (Auth::check() && Auth::user()->rol=='Prestador')
                    return $next($request);
                    else
                    {
                        return redirect('/');
                    }
            
    }
}
