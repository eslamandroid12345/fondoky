<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Interfaces\Web\RoleRepositoryInterface;

class RoleController extends Controller
{


    public $roleRepositoryInterface;

    public function __construct(RoleRepositoryInterface $roleRepositoryInterface)
    {

        $this->roleRepositoryInterface = $roleRepositoryInterface;

    }


    public function index(){


        return $this->roleRepositoryInterface->index();

    }

    public function create(){

        return $this->roleRepositoryInterface->create();

    }


    public function store(StoreRoleRequest $request){

        return $this->roleRepositoryInterface->store($request);


    }


    public function edit($id){


        return $this->roleRepositoryInterface->edit($id);

    }


    public function update(UpdateRoleRequest $request,$id){


        return $this->roleRepositoryInterface->update($request,$id);
    }

}
