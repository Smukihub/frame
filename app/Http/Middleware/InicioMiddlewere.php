<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class InicioMiddlewere
{
    /**
     * Obtenga la ruta a la que se debe redirigir al usuario cuando no esté autenticado.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check()) 
            return $next($request);
            
                else
                {
                    return redirect('/login');
                }
    }
}
