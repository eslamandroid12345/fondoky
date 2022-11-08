<?php

namespace App\Http\Controllers;

use App\Http\Requests\SettingRequest;
use App\Interfaces\Web\SettingRepositoryInterface;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public $settingRepositoryInterface;

    public function __construct(SettingRepositoryInterface $settingRepositoryInterface){

        $this->settingRepositoryInterface = $settingRepositoryInterface;


    }

    public function getSetting(){

        return $this->settingRepositoryInterface->getSetting();

    }


    public function store(SettingRequest $request){

        return $this->settingRepositoryInterface->store($request);


    }

    public function delete(Request $request){

        return $this->settingRepositoryInterface->delete($request);


    }

    public function update(Request $request){

        return $this->settingRepositoryInterface->update($request);


    }
}
