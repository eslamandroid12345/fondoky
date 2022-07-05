<?php

use App\Http\Controllers\SupervisorController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(['prefix'=>LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function(){




    Route::get('supervisors/show',[SupervisorController::class,'show'])->name('supervisors.show')->middleware('guest:supervisor');//show view login
    Route::post('supervisors/login',[SupervisorController::class,'login'])->name('supervisors.login');//login with supervisor

    Route::group(['prefix'=>'supervisors','middleware' => 'auth:supervisor'], function (){

        Route::get('home',[SupervisorController::class,'home'])->name('supervisors.home');//home dashboard of supervisor


    });


    Route::group(['prefix'=>'supervisors','middleware' => 'auth:admin'], function (){

        Route::get('register',[SupervisorController::class,'create'])->name('supervisors.register')->middleware('supervisor');//return view register
        Route::get('all',[SupervisorController::class,'supervisors'])->name('supervisors.all')->middleware('supervisors');//return all supervisors
        Route::post('store',[SupervisorController::class,'store'])->name('supervisors.store');//store supervisor


    });




});

