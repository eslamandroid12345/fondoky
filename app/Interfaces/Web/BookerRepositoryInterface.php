<?php


namespace App\Interfaces\Web;


use App\Http\Requests\StoreBookerRequest;


interface BookerRepositoryInterface
{
    public function store(StoreBookerRequest $request,$id);
    public function active($id);



}