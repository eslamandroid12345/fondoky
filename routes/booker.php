<?php

use App\Http\Controllers\BookerController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


Route::group(['prefix'=>LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function(){

Route::group(['prefix' => 'bookers','middleware' => 'auth'], function (){

    Route::get('book/{id}',[BookerController::class,'hotel'])->name('bookers.book');


    Route::get('cancel/{id}',[BookerController::class,'active'])->name('bookers.cancel');
    Route::post('store/{id}',[BookerController::class,'store'])->name('bookers.store');
    Route::delete('delete/{hotel}',[BookerController::class,'delete'])->name('bookers.delete');

});
});


