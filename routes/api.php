<?php

use App\Http\Controllers\Api\AdminController;
use App\Http\Controllers\Api\HotelController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//api app


Route::group(['middleware' => 'lang'], function (){

    Route::group(['prefix' => 'user','namespace' => 'Api'], function (){

        Route::get('all',[UserController::class,'users'])->middleware(['check:admin-api']);
        Route::post('login',[UserController::class,'login']);
        Route::post('register',[UserController::class,'register']);
        Route::post('logout',[UserController::class,'logout']);
    });

    Route::group(['prefix' => 'hotel','namespace' => 'Api'], function (){

        Route::post('login',[HotelController::class,'login']);
        Route::post('register',[HotelController::class,'register']);
        Route::post('logout',[HotelController::class,'logout']);
        Route::get('getProfile',[HotelController::class,'getProfile']);
        Route::post('updateProfile',[HotelController::class,'updateProfile']);
        Route::get('reservations',[HotelController::class,'reservations']);

    });


    Route::group(['prefix' => 'admin','namespace' => 'Api'], function (){

        Route::post('login',[AdminController::class,'login']);
        Route::post('register',[AdminController::class,'register']);
        Route::post('logout',[AdminController::class,'logout']);
    });


    Route::group(['prefix' => 'roles','namespace' => 'Api','middleware' => ['check:admin-api']], function (){

        Route::get('index',[RoleController::class,'index']);
        Route::post('store',[RoleController::class,'store']);
        Route::put('update/{id}',[RoleController::class,'update']);

    });

});

