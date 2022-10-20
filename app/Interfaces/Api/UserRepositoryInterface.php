<?php


namespace App\Interfaces\Api;



use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\StoreUserRequest;

interface UserRepositoryInterface
{

    public function users();
    public function register(StoreUserRequest $request);
    public function login(LoginUserRequest $request);
    public function logout();

}