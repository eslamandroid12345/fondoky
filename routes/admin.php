<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommissionController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(['prefix'=>LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function(){




    Route::get('admins/show',[AdminController::class,'show'])->name('admins.show')->middleware('guest:admin');//return view admin login
    Route::post('admins/login',[AdminController::class,'login'])->name('admins.login')->middleware('guest:admin');

    Route::group(['prefix'=>'admins','middleware' => ['auth:admin','can:admins']], function (){


        Route::get('register',[AdminController::class,'create'])->name('admins.register');//return view admin register
        Route::get('index',[AdminController::class,'index'])->name('admins.index');//return view admin all
        Route::post('store',[AdminController::class,'store'])->name('admins.store');//store data of admin
        Route::get('hotels/active/{id}',[AdminController::class,'active_hotels'])->name('admins.hotels/active');//return view admin register



    });

    Route::group(['prefix'=>'admins','middleware' => 'auth:admin'], function (){

        Route::get('hotel/all',[AdminController::class,'hotel'])->name('admins.hotel.all')->middleware('can:hotels');//return view hotels all



    });

    Route::group(['prefix'=>'roles','middleware' => ['auth:admin','can:roles']], function (){

        Route::get('index',[RoleController::class,'index'])->name('roles.index');//return view roles/index
        Route::get('create',[RoleController::class,'create'])->name('roles.create');//return view roles/create
        Route::post('store',[RoleController::class,'store'])->name('roles.store');//return view roles/create
        Route::get('edit/{id}',[RoleController::class,'edit'])->name('roles.edit');//return view roles/create
        Route::put('update/{id}',[RoleController::class,'update'])->name('roles.update');//return view roles/create


    });

    Route::group(['prefix' => 'booking','middleware' => ['auth:admin','can:reservations']], function (){


        Route::get('all', [AdminController::class,'booking'])->name('booking.all');

    });


    //start commission for hotels
    Route::group(['prefix'=>'admins','middleware' => ['auth:admin','can:reports']], function (){

        Route::get('commissions',[CommissionController::class,'commissions'])->name('admins.commissions');
        Route::get('commissions/hotel/{id}',[CommissionController::class,'index'])->name('admins.commissions.hotel');
        Route::get('month/hotel/{id}',[CommissionController::class,'commissionOfMonth'])->name('admins.month.hotel');


    });

    Route::group(['prefix'=>'admins','middleware' => ['auth:admin']], function (){

        Route::get('setting',function (){

            return view('settings.index');
        })->name('admins.setting');


    });

});
