<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginAdminRequest;
use App\Http\Requests\StoreAdminRequest;
use App\Interfaces\Web\AdminRepositoryInterface;


class AdminController extends Controller
{


    public $adminRepositoryInterface;

    public function __construct(AdminRepositoryInterface $adminRepositoryInterface)
    {

        $this->adminRepositoryInterface = $adminRepositoryInterface;

    }


    public function hotel(){

     return $this->adminRepositoryInterface->hotel();

    }




    public function booking(){

        return $this->adminRepositoryInterface->booking();

    }


    public function show(){

        return $this->adminRepositoryInterface->show();

    }

    public function login(LoginAdminRequest $request){


        return $this->adminRepositoryInterface->login($request);

    }




    public function create(){

        return $this->adminRepositoryInterface->create();

    }


    public function store(StoreAdminRequest $request){


       return $this->adminRepositoryInterface->store($request);

    }


    public function index(){

      return $this->adminRepositoryInterface->index();

    }


    public function active_hotels($id){


        return $this->adminRepositoryInterface->active_hotels($id);

    }



}
