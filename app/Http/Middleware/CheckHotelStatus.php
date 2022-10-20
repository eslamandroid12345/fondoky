<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckHotelStatus
{

    public function handle(Request $request, Closure $next)
    {

        if(auth()->guard('hotel')->user()->blocked != true){

            auth()->guard('hotel')->logout();
            return redirect()->route('hotels.show');
        }

        return $next($request);
    }
}
