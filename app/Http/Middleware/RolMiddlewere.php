<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;

class RolMiddlewere
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->rol=='Jefe' ) 
            return $next($request);
            if (Auth::user()->rol=='Auxiliar')
                return $next($request);
                else
                {
                    return redirect('/');
                }
            
    }
}
