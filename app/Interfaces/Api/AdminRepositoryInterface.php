<?php


namespace App\Interfaces\Api;


use App\Http\Requests\LoginAdminRequest;
use App\Http\Requests\StoreAdminRequest;
use Illuminate\Http\Request;

interface AdminRepositoryInterface
{

    public function login(LoginAdminRequest $request);
    public function register(StoreAdminRequest $request);
    public function logout();
}