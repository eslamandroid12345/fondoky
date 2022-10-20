<?php

namespace App\Interfaces\Web;

use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use Illuminate\Http\Request;

interface EventRepositoryInterface{

    public function create($id);
    public function store(StoreEventRequest $request);
    public function edit($id);
    public function update(UpdateEventRequest $request,$id);
    public function destroy($id);

}