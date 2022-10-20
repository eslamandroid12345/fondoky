<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{

    public const HOME = '/home';
    public const ADMIN = 'admins/hotel/all';
    public const HOTEL = 'hotels/reservations';


    protected $namespace = 'App\\Http\\Controllers';


    public function boot()
    {
        $this->configureRateLimiting();


        //start route of api for android applications
        $this->routes(function () {
            Route::prefix('api')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/api.php'));


            //start web route of application
            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/web.php'));


            Route::middleware('web')->namespace($this->namespace)
                ->group(base_path('routes/hotel.php'));

            Route::middleware('web')->namespace($this->namespace)
                ->group(base_path('routes/admin.php'));




        });
    }


    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by(optional($request->user())->id ?: $request->ip());
        });
    }
}
