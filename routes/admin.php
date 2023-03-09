<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommissionController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SettingController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


Route::group(['prefix'=>LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function(){

    Route::get('admins/show',[AdminController::class,'show'])->name('admins.show')->middleware('guest:admin');
    Route::post('admins/login',[AdminController::class,'login'])->name('admins.login')->middleware('guest:admin');

    Route::group(['prefix'=>'admins','middleware' => ['auth:admin','can:admins']], function (){

        Route::get('register',[AdminController::class,'create'])->name('admins.register');
        Route::get('index',[AdminController::class,'index'])->name('admins.index');
        Route::post('store',[AdminController::class,'store'])->name('admins.store');
        Route::get('hotels/active/{id}',[AdminController::class,'active_hotels'])->name('admins.hotels/active');

    });

    Route::group(['prefix'=>'admins','middleware' => 'auth:admin'], function (){

        Route::get('hotel/all',[AdminController::class,'hotel'])->name('admins.hotel.all')->middleware('can:hotels');

    });

    Route::group(['prefix'=>'roles','middleware' => ['auth:admin','can:roles']], function (){

        Route::get('index',[RoleController::class,'index'])->name('roles.index');
        Route::get('create',[RoleController::class,'create'])->name('roles.create');
        Route::post('store',[RoleController::class,'store'])->name('roles.store');
        Route::get('edit/{id}',[RoleController::class,'edit'])->name('roles.edit');
        Route::put('update/{id}',[RoleController::class,'update'])->name('roles.update');

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

    Route::group(['prefix'=>'settings','middleware' => ['auth:admin']], function (){

        Route::get('index',[SettingController::class,'index'])->name('settings.index');
        Route::get('create',[SettingController::class,'create'])->name('settings.create');
        Route::post('store',[SettingController::class,'store'])->name('settings.store');
        Route::get('edit/{id}',[SettingController::class,'edit'])->name('settings.edit');
        Route::get('show/{id}',[SettingController::class,'show'])->name('settings.show');
        Route::put('update/{id}',[SettingController::class,'update'])->name('settings.update');
        Route::get('delete/{id}',[SettingController::class,'delete'])->name('settings.delete');

    });

    Route::group(['prefix'=>'currencies','middleware' => ['auth:admin']], function (){
        Route::get('index',[CurrencyController::class,'getCurrencies'])->name('currencies.index');
        Route::post('store',[CurrencyController::class,'store'])->name('currencies.store');
        Route::put('update',[CurrencyController::class,'update'])->name('currencies.update');
        Route::delete('delete',[CurrencyController::class,'delete'])->name('currencies.delete');

    });

});
