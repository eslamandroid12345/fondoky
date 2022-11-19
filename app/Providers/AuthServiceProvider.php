<?php

namespace App\Providers;

use Illuminate\Auth\Access\Response;//Auth
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


        //start hotel allow for rooms and calendars and room type


        Gate::define('edit-room', function ($user,$room) {
            return $user->id == $room->hotel_id
                ? Response::allow()
                : Response::deny('You must not allowed this page');
        });



        Gate::define('show-room', function ($user,$room) {
            return $user->id == $room->hotel_id
                ? Response::allow()
                : Response::deny('You must not allowed this page');
        });

        Gate::define('show-calendar', function ($user,$room) {
            return $user->id == $room->hotel_id
                ? Response::allow()
                : Response::deny('You must not allowed this page');
        });


        Gate::define('edit-service', function ($user,$room_service) {
            return $user->id == $room_service->hotel_id
                ? Response::allow()
                : Response::deny('You must not allowed this page');
        });


        Gate::define('invoice-arrivals', function ($user,$invoice) {
            return $user->id == $invoice->hotel_id
                ? Response::allow()
                : Response::deny('You must not allowed this page');
        });

    }
}
