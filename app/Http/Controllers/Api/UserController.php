<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Interfaces\Api\UserRepositoryInterface;


class UserController extends Controller
{


    public $userRepositoryInterface;

    public function __construct(UserRepositoryInterface $userRepositoryInterface)
    {

        $this->userRepositoryInterface = $userRepositoryInterface;

    }


    public function users(){


        return $this->userRepositoryInterface->users();

    }

    public function register(StoreUserRequest $request){


        return $this->userRepositoryInterface->register($request);

    }


    public function login(LoginUserRequest $request){


      return $this->userRepositoryInterface->login($request);

    }



    public function logout(){

        return $this->userRepositoryInterface->logout();

    }
}
