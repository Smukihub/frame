<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class JefeAuxMiddleware
{
    /**
     * Obtenga la ruta a la que se debe redirigir al usuario cuando no esté autenticado,
     * verifica que tipo de usuario es.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->rol=='Jefe' ) 
        return $next($request);
        if (Auth::check() && Auth::user()->rol=='Auxiliar')
            return $next($request);
                else
                {
                    return redirect('/');
                }
        
    }
}
