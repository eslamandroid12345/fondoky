<?php


namespace App\Interfaces\Api;


use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;

interface RoleRepositoryInterface
{


    public function index();
    public function store(StoreRoleRequest $request);
    public function update(UpdateRoleRequest $request,$id);
}