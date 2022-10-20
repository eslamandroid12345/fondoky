<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{

    protected function redirectTo($request){


        if (! $request->expectsJson()) {

            if (in_array('auth:admin', $request->route()->middleware())) { // if admin not auth redirect login admin

                return route('admins.show');

            }elseif (in_array('auth:hotel', $request->route()->middleware())){ // if hotel not auth redirect login hotel

                return route('hotels.show');

            } else{

                return route('login'); // user not authenticated

            }

        }
    }
}
