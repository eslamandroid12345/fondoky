<?php

namespace App\Interfaces\Web\Currencies;
use App\Http\Requests\StoreCurrencyRequest;
use Illuminate\Http\Request;

interface CurrencyRepositoryInterface{

    public function getCurrencies();
    public function store(StoreCurrencyRequest $request);
    public function delete(Request $request);
    public function update(Request $request);


}