<?php


namespace App\Interfaces\Api;
use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Http\Request;

interface UserRepositoryInterface
{

    public function users();
    public function register(Request $request);
    public function login(Request $request);
    public function logout();

}
