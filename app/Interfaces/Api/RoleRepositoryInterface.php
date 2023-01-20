<?php


namespace App\Interfaces\Api;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateRoleRequest;

interface RoleRepositoryInterface
{


    public function index();
    public function store(Request $request);
    public function update(Request $request,$id);
}
