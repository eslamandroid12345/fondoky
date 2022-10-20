<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class AuthCheckApi
{

    public function handle(Request $request, Closure $next,$guard = null)
    {

        if($guard != null){

            auth()->shouldUse($guard);

            try {

                 auth()->authenticate();

            }catch (\Exception $exception){


                return returnMessageError($exception->getMessage(),Response::HTTP_UNAUTHORIZED);
            }

            return $next($request);

        }




    }
}
