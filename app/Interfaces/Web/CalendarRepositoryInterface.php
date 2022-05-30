<?php


namespace App\Interfaces\Web;


use App\Http\Requests\CalendarStoreRequest;
use App\Http\Requests\CalendarUpdateRequest;

interface CalendarRepositoryInterface
{

    public function create($id);
    public function store(CalendarStoreRequest $request);
    public function edit($id);
    public function update(CalendarUpdateRequest $request,$id);
    public function toDay($id);
    public function delete($id);


}