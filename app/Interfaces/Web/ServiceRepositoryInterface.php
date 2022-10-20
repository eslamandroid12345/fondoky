<?php


namespace App\Interfaces\Web;


use App\Http\Requests\StoreServiceRequest;

interface ServiceRepositoryInterface
{

    public function create();
    public function store(StoreServiceRequest $request);
    public function edit($id);
    public function update(StoreServiceRequest $request, $id);


}