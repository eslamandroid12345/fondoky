<?php


namespace App\Interfaces\Api;


use App\Http\Requests\LoginAdminRequest;
use App\Http\Requests\StoreAdminRequest;
use Illuminate\Http\Request;

interface AdminRepositoryInterface
{

    public function login(Request $request);
    public function register(Request $request);
    public function logout();
}
