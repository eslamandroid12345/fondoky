<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginAdminRequest;
use App\Http\Requests\StoreAdminRequest;
use App\Interfaces\Api\AdminRepositoryInterface;

class AdminController extends Controller
{


    public $adminRepositoryInterface;

    public function __construct(AdminRepositoryInterface $adminRepositoryInterface){

        $this->adminRepositoryInterface = $adminRepositoryInterface;

    }

    public function login(LoginAdminRequest $request){


        return $this->adminRepositoryInterface->login($request);

    }

    public function register(StoreAdminRequest $request){

        return $this->adminRepositoryInterface->register($request);


    }


    public function logout(){


        return $this->adminRepositoryInterface->logout();

    }
}
