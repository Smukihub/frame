<?php

namespace App\Providers;


use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Policies\UserPolicy;
use App\Policies\ProyectoPolicy;
use App\Models\User;
use App\Models\Proyecto;

class AuthServiceProvider extends ServiceProvider
{
    /**
     *Las asignaciones de políticas para la aplicación.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
        User::class => UserPolicy::class,
        Proyecto::class => ProyectoPolicy::class,
        
    ];

    /**
     * Registre cualquier servicio de autenticación / autorización.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('jefe-only', function ($user) {
            return $user->rol == "Jefe";
        });
        Gate::define('auxiliar-jefe', function ($user) {
            return $user->rol == "Jefe" || $user->rol == "Auxiliar";
        });
        Gate::define('externo-jefe', function ($user) {
            return $user->rol == "Jefe" || $user->rol == "Externo";
        });
        Gate::define('prestador-jefe', function ($user) {
            return $user->rol == "Jefe" || $user->rol == "Prestador";
        });
    
    }
}
