<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginSupervisorRequest;
use App\Http\Requests\StoreSupervisorRequest;
use App\Interfaces\Web\SupervisorRepositoryInterface;


class SupervisorController extends Controller
{


    public $supervisorRepositoryInterface;

    public function __construct(SupervisorRepositoryInterface $supervisorRepositoryInterface){


        $this->supervisorRepositoryInterface = $supervisorRepositoryInterface;


    }


    public function show(){


        return $this->supervisorRepositoryInterface->show();

    }


    public function login(LoginSupervisorRequest $request){


        return $this->supervisorRepositoryInterface->login($request);


    }

    public function create(){


        return $this->supervisorRepositoryInterface->create();


    }



    public function store(StoreSupervisorRequest $request){


        return $this->supervisorRepositoryInterface->store($request);


    }



    public function home(){

        return $this->supervisorRepositoryInterface->home();


    }

    public function supervisors(){

        return $this->supervisorRepositoryInterface->supervisors();


    }



}


