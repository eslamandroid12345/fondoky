<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class LastSeenUserActivity
{
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {

            $expireTime = Carbon::now('Africa/Cairo')->addSecond(1); // keep online for 1 min
            Cache::put('is_online'.Auth::user()->id, true, $expireTime);

            //Last Seen
            User::where('id', Auth::user()->id)->update(['last_seen' => Carbon::now('Africa/Cairo')]);
        }
        return $next($request);
    }
}
