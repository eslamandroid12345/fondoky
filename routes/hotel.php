<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\HotelServiceRoomController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\RoomServiceController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;//use package of translation

/*
 * hotel routes of application
 */

Route::group(['prefix'=>LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function(){


    //hotel login and hotel register
Route::group(['prefix' => 'hotels', 'middleware' => 'guest:hotel'], function (){

    Route::get('show','HotelController@show')->name('hotels.show');
    Route::post('login','HotelController@login')->name('hotels.login');
    Route::get('show/register','HotelController@showRegister')->name('hotels.show.register');
    Route::post('register','HotelController@register')->name('hotels.register');

});

Route::group(['prefix'=>'hotels','middleware' => ['auth:hotel','status']], function (){

    Route::get('reservations','HotelController@reservations')->name('hotels.reservations');
    Route::get('block/{id}','HotelController@block')->name('hotels.block');
    Route::get('stay/{id}','HotelController@stay')->name('hotels.stay');
    Route::get('all','HotelController@index')->name('hotels.all');
    Route::get('edit','HotelController@edit')->name('hotels.edit');
    Route::put('update/{id}','HotelController@update')->name('hotels.update');
    Route::delete('delete/{id}','HotelController@delete')->name('hotels.delete');
    Route::get('arrivals/pdf/{id}','HotelController@arrivalsPdf')->name('hotels.arrivals.pdf');
    Route::get('invoices', 'HotelController@invoices')->name('hotels.invoices');
    Route::get('month/invoices', 'HotelController@monthOfInvoices')->name('hotels.month.invoices');
    Route::get('arrivals', 'HotelController@arrivals')->name('hotels.arrivals');
    Route::get('rates', 'HotelController@rates')->name('hotels.rates');
    Route::get('comments', 'HotelController@comments')->name('hotels.comments');
});

    Route::post('comments/create', 'HotelController@comment')->name('hotels.comments.create');
    Route::group(['prefix'=>'rooms','middleware'=> ['auth:hotel','status']], function (){

        Route::get('index','RoomController@index')->name('rooms.index');
        Route::get('create','RoomController@create')->name('rooms.create');
        Route::post('store','RoomController@store')->name('rooms.store');
        Route::get('edit/{room}','RoomController@edit')->name('rooms.edit');
        Route::get('show/{room}','RoomController@show')->name('rooms.show');
        Route::put('update/{id}','RoomController@update')->name('rooms.update');
        Route::delete('delete/{id}','RoomController@delete')->name('rooms.delete');
        Route::get('calendars/show/{id}', 'RoomController@calendarsShow')->name('rooms.calendars.show');
    });

    Route::group(['prefix'=>'services','middleware'=> ['auth:hotel','status']], function (){

        Route::get('create','ServiceController@create')->name('services.create');
        Route::post('store','ServiceController@store')->name('services.store');
        Route::get('edit/{id}','ServiceController@edit')->name('services.edit');
        Route::put('update/{id}','ServiceController@update')->name('services.update');


    });

    //create and store new room services
    Route::group(['prefix'=>'room-services','middleware'=> ['auth:hotel','status']], function (){

        Route::get('index','RoomServiceController@index')->name('room-services.index');
        Route::get('create','RoomServiceController@create')->name('room-services.create');
        Route::post('store','RoomServiceController@store')->name('room-services.store');
        Route::get('edit/{id}','RoomServiceController@edit')->name('room-services.edit');
        Route::put('update/{id}','RoomServiceController@update')->name('room-services.update');
        Route::get('delete/{id}','RoomServiceController@delete')->name('room-services.delete');

    });

    Route::group(['prefix'=>'hotel-room-services','middleware'=> ['auth:hotel','status']], function (){
        Route::get('create','HotelServiceRoomController@create')->name('hotel-room-services.create');
        Route::post('store','HotelServiceRoomController@store')->name('hotel-room-services.store');

    });

    //start events of rooms in hotel
   Route::group(['prefix'=>'calendars','middleware'=> ['auth:hotel','status']], function (){

       Route::get('create/{id}', 'EventController@create')->name('calendars.create');
       Route::post('store', 'EventController@store')->name('calendars.store');
       Route::get('edit/{id}', 'EventController@edit')->name('calendars.edit');
       Route::put('update/{id}', 'EventController@update')->name('calendars.update');
       Route::get('destroy/{id}', 'EventController@destroy')->name('calendars.destroy');

    });
});

//usr/local/bin/php /home/myhotel/public_html/artisan schedule:run >> /dev/null 2>&1
