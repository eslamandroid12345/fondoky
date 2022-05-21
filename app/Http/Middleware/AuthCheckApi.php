<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;


class AuthCheckApi
{

    public function handle(Request $request, Closure $next,$guard = null)
    {

        if($guard != null){

            auth()->shouldUse($guard);

            try {

                $user= auth()->authenticate();

            }catch (\Exception $exception){


                return returnMessageError($exception->getMessage(),"500");
            }

            return $next($request);

        }




    }
}
