<?php

namespace App\Providers;

use App\Interfaces\Api\HotelRepositoryInterface;
use App\Interfaces\Api\UserRepositoryInterface;
use App\Interfaces\Web\AdminRepositoryInterface;
use App\Interfaces\Web\BookerRepositoryInterface;
use App\Interfaces\Web\CalendarRepositoryInterface;
use App\Interfaces\Web\RoleRepositoryInterface;
use App\Interfaces\Web\RoomRepositoryInterface;
use App\Repositories\Api\HotelRepository;
use App\Repositories\Api\UserRepository;
use App\Repositories\Web\AdminRepository;
use App\Repositories\Web\BookerRepository;
use App\Repositories\Web\CalendarRepository;
use App\Repositories\Web\RoleRepository;
use App\Repositories\Web\RoomRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{

    public function register()
    {


        //Api repositories
        $this->app->bind(HotelRepositoryInterface::class,HotelRepository::class);
        $this->app->bind(UserRepositoryInterface::class,UserRepository::class);


        //web repositories
        $this->app->bind(CalendarRepositoryInterface::class,CalendarRepository::class);
        $this->app->bind(\App\Interfaces\Web\HotelRepositoryInterface::class,\App\Repositories\Web\HotelRepository::class);
        $this->app->bind(AdminRepositoryInterface::class,AdminRepository::class);
        $this->app->bind(RoleRepositoryInterface::class,RoleRepository::class);
        $this->app->bind(RoomRepositoryInterface::class,RoomRepository::class);
        $this->app->bind(BookerRepositoryInterface::class,BookerRepository::class);
        $this->app->bind(\App\Interfaces\Web\UserRepositoryInterface::class,\App\Repositories\Web\UserRepository::class);
    }


    public function boot()
    {
        //
    }
}
