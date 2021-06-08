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
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
        User::class => UserPolicy::class,
        Proyecto::class => ProyectoPolicy::class,
        
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
