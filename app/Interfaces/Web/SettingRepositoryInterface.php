<?php

namespace App\Interfaces\Web;

use App\Http\Requests\SettingRequest;
use Illuminate\Http\Request;

interface SettingRepositoryInterface{

    public function getSetting();
    public function store(SettingRequest $request);
    public function delete(Request $request);
    public function update(Request $request);

}