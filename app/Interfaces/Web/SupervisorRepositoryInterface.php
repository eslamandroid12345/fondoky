<?php


namespace App\Interfaces\Web;


use App\Http\Requests\LoginSupervisorRequest;
use App\Http\Requests\StoreSupervisorRequest;

interface SupervisorRepositoryInterface
{

    public function show();
    public function login(LoginSupervisorRequest $request);
    public function create();
    public function store(StoreSupervisorRequest $request);
    public function home();
    public function supervisors();


}