<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Interfaces\Api\RoleRepositoryInterface;

class RoleController extends Controller
{


    public $roleRepositoryInterface;


    public function __construct(RoleRepositoryInterface $roleRepositoryInterface){


        $this->roleRepositoryInterface = $roleRepositoryInterface;


    }


    public function index(){

        return $this->roleRepositoryInterface->index();

    }


    public function store(StoreRoleRequest $request){

        return $this->roleRepositoryInterface->store($request);


    }



    public function update(UpdateRoleRequest $request,$id){

        return $this->roleRepositoryInterface->update($request,$id);

    }


}
