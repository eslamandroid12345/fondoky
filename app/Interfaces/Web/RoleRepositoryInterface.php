<?php


namespace App\Interfaces\Web;


use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;


interface RoleRepositoryInterface
{


    public function index();
    public function create();
    public function store(StoreRoleRequest $request);
    public function edit($id);
    public function update(UpdateRoleRequest $request,$id);

}