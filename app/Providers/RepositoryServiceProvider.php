<?php

namespace App\Providers;

use App\Interfaces\Api\HotelRepositoryInterface;
use App\Interfaces\Api\UserRepositoryInterface;
use App\Interfaces\Web\AdminRepositoryInterface;
use App\Interfaces\Web\CalendarRepositoryInterface;
use App\Interfaces\Web\CommentRepositoryInterface;
use App\Interfaces\Web\CommissionRepositoryInterface;
use App\Interfaces\Web\HotelServiceRoomRepositoryInterface;
use App\Interfaces\Web\ReservationRepositoryInterface;
use App\Interfaces\Web\RoleRepositoryInterface;
use App\Interfaces\Web\RoomRepositoryInterface;
use App\Interfaces\Web\RoomServiceRepositoryInterface;
use App\Interfaces\Web\ServiceRepositoryInterface;
use App\Repositories\Api\HotelRepository;
use App\Repositories\Api\UserRepository;
use App\Repositories\Web\AdminRepository;
use App\Repositories\Web\CalendarRepository;
use App\Repositories\Web\CommentRepository;
use App\Repositories\Web\CommissionRepository;
use App\Repositories\Web\HotelServiceRoomRepository;
use App\Repositories\Web\ReservationRepository;
use App\Repositories\Web\RoleRepository;
use App\Repositories\Web\RoomRepository;
use App\Repositories\Web\RoomServiceRepository;
use App\Repositories\Web\ServiceRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{

    public function register()
    {


        //Api repositories
        $this->app->bind(HotelRepositoryInterface::class,HotelRepository::class);
        $this->app->bind(UserRepositoryInterface::class,UserRepository::class);
        $this->app->bind(\App\Interfaces\Api\RoleRepositoryInterface::class,\App\Repositories\Api\RoleRepository::class);
        $this->app->bind(\App\Interfaces\Api\AdminRepositoryInterface::class,\App\Repositories\Api\AdminRepository::class);


        //web repositories
        $this->app->bind(CalendarRepositoryInterface::class,CalendarRepository::class);
        $this->app->bind(\App\Interfaces\Web\HotelRepositoryInterface::class,\App\Repositories\Web\HotelRepository::class);
        $this->app->bind(AdminRepositoryInterface::class,AdminRepository::class);
        $this->app->bind(RoleRepositoryInterface::class,RoleRepository::class);
        $this->app->bind(RoomRepositoryInterface::class,RoomRepository::class);
        $this->app->bind(\App\Interfaces\Web\UserRepositoryInterface::class,\App\Repositories\Web\UserRepository::class);
        $this->app->bind(ServiceRepositoryInterface::class,ServiceRepository::class);
        $this->app->bind(CommissionRepositoryInterface::class,CommissionRepository::class);
        $this->app->bind(CommentRepositoryInterface::class,CommentRepository::class);

        //Repository pattern of room service
        $this->app->bind(RoomServiceRepositoryInterface::class,RoomServiceRepository::class);
        $this->app->bind(HotelServiceRoomRepositoryInterface::class,HotelServiceRoomRepository::class);
        $this->app->bind(ReservationRepositoryInterface::class,ReservationRepository::class);

    }


    public function boot()
    {
        //
    }
}
