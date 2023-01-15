<?php

namespace App\Interfaces\Web;

use App\Http\Requests\SettingRequest;
use App\Http\Requests\UpdateSettingRequest;
use Illuminate\Http\Request;

interface SettingRepositoryInterface{

    public function index();
    public function create();
    public function store(SettingRequest $request);
    public function edit($id);
    public function show($id);
    public function update(UpdateSettingRequest $request,$id);
    public function delete($id);
}
