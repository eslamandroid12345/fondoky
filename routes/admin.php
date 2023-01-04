<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommissionController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SettingController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


Route::group(['prefix'=>LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function(){

    Route::get('admins/show','AdminController@show')->name('admins.show')->middleware('guest:admin');
    Route::post('admins/login','AdminController@login')->name('admins.login')->middleware('guest:admin');

    Route::group(['prefix'=>'admins','middleware' => ['auth:admin','can:admins']], function (){

        Route::get('register','AdminController@create')->name('admins.register');
        Route::get('index','AdminController@index')->name('admins.index');
        Route::post('store','AdminController@store')->name('admins.store');
        Route::get('hotels/active/{id}','AdminController@active_hotels')->name('admins.hotels/active');

    });

    Route::group(['prefix'=>'admins','middleware' => 'auth:admin'], function (){

        Route::get('hotel/all','AdminController@hotel')->name('admins.hotel.all')->middleware('can:hotels');

    });

    Route::group(['prefix'=>'roles','middleware' => ['auth:admin','can:roles']], function (){

        Route::get('index','RoleController@index')->name('roles.index');
        Route::get('create','RoleController@create')->name('roles.create');
        Route::post('store','RoleController@store')->name('roles.store');
        Route::get('edit/{id}','RoleController@edit')->name('roles.edit');
        Route::put('update/{id}','RoleController@update')->name('roles.update');

    });

    Route::group(['prefix' => 'booking','middleware' => ['auth:admin','can:reservations']], function (){

        Route::get('all', 'AdminController@booking')->name('booking.all');

    });


    //start commission for hotels
    Route::group(['prefix'=>'admins','middleware' => ['auth:admin','can:reports']], function (){

        Route::get('commissions','CommissionController@commissions')->name('admins.commissions');
        Route::get('commissions/hotel/{id}','CommissionController@index')->name('admins.commissions.hotel');
        Route::get('month/hotel/{id}','CommissionController@commissionOfMonth')->name('admins.month.hotel');

    });

    Route::group(['prefix'=>'settings','middleware' => ['auth:admin']], function (){

        Route::get('index','SettingController@getSetting')->name('settings.index');
        Route::post('store','SettingController@store')->name('settings.store');
        Route::put('update','SettingController@update')->name('settings.update');
        Route::delete('delete','SettingController@delete')->name('settings.delete');

    });

    Route::group(['prefix'=>'currencies','middleware' => ['auth:admin']], function (){
        Route::get('index','CurrencyController@getCurrencies')->name('currencies.index');
        Route::post('store','CurrencyController@store')->name('currencies.store');
        Route::put('update','CurrencyController@update')->name('currencies.update');
        Route::delete('delete','CurrencyController:@delete')->name('currencies.delete');

    });

});
