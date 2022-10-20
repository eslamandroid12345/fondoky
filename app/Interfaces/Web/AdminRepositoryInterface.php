<?php


namespace App\Interfaces\Web;


use App\Http\Requests\LoginAdminRequest;
use App\Http\Requests\StoreAdminRequest;


interface AdminRepositoryInterface
{


    public function hotel();
    public function booking();
    public function show();
    public function login(LoginAdminRequest $request);
    public function create();
    public function store(StoreAdminRequest $request);
    public function index();
    public function active_hotels($id);

}