<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{

    protected $policies = [

        'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];


    public function boot()
    {
        $this->registerPolicies();

          //admin permissions for dashboard
        foreach (config('access.permissions') as $ability => $value){

            Gate::define($ability,function ($auth) use ($ability){

                return $auth->hasAbility($ability);
            });

        }



    }
}
