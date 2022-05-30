<?php

namespace App\Providers;

use App\Interfaces\Api\HotelRepositoryInterface;
use App\Interfaces\Web\CalendarRepositoryInterface;
use App\Repositories\Api\HotelRepository;
use App\Repositories\Web\CalendarRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{

    public function register()
    {


        //Api repositories
        $this->app->bind(HotelRepositoryInterface::class,HotelRepository::class);


        //web repositories
        $this->app->bind(CalendarRepositoryInterface::class,CalendarRepository::class);
        $this->app->bind(\App\Interfaces\Web\HotelRepositoryInterface::class,\App\Repositories\Web\HotelRepository::class);
    }


    public function boot()
    {
        //
    }
}
