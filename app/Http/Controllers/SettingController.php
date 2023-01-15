<?php

namespace App\Http\Controllers;

use App\Http\Requests\SettingRequest;
use App\Http\Requests\UpdateSettingRequest;
use App\Interfaces\Web\SettingRepositoryInterface;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public $settingRepositoryInterface;

    public function __construct(SettingRepositoryInterface $settingRepositoryInterface){

        $this->settingRepositoryInterface = $settingRepositoryInterface;

    }

    public function index(){

        return $this->settingRepositoryInterface->index();

    }


    public function store(SettingRequest $request){

        return $this->settingRepositoryInterface->store($request);

    }


    public function create(){

        return $this->settingRepositoryInterface->create();

    }


    public function edit($id){

        return $this->settingRepositoryInterface->edit($id);

    }

    public function show($id){

        return $this->settingRepositoryInterface->show($id);

    }

    public function update(UpdateSettingRequest $request,$id){

        return $this->settingRepositoryInterface->update($request,$id);

    }

    public function delete($id){

        return $this->settingRepositoryInterface->delete($id);

    }


}
