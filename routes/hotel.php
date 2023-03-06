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

Route::group(['prefix'=>LaravelLocalization::setLocale(),'middleware' => ['localeSessionRedirect','localizationRedirect','localeViewPath']], function(){


    //hotel login and hotel register
Route::group(['prefix' => 'hotels', 'middleware' => 'guest:hotel'], function (){

    Route::get('show',[HotelController::class,'show'])->name('hotels.show');
    Route::post('login',[HotelController::class,'login'])->name('hotels.login');
    Route::get('show/register',[HotelController::class,'showRegister'])->name('hotels.show.register');
    Route::post('register',[HotelController::class,'register'])->name('hotels.register');
});

Route::group(['prefix'=>'hotels','middleware' => ['auth:hotel','status']], function (){

    Route::get('reservations',[HotelController::class,'reservations'])->name('hotels.reservations');
    Route::get('block/{id}',[HotelController::class,'block'])->name('hotels.block');
    Route::get('stay/{id}',[HotelController::class,'stay'])->name('hotels.stay');
    Route::get('all',[HotelController::class,'index'])->name('hotels.all');
    Route::get('edit',[HotelController::class,'edit'])->name('hotels.edit');
    Route::put('update/{id}',[HotelController::class,'update'])->name('hotels.update');
    Route::delete('delete/{id}',[HotelController::class,'delete'])->name('hotels.delete');
    Route::get('arrivals/pdf/{id}',[HotelController::class,'arrivalsPdf'])->name('hotels.arrivals.pdf');
    Route::get('invoices/{month}/{year}', [HotelController::class,'invoices'])->name('hotels.invoices');
    Route::get('invoices/all', [HotelController::class,'invoicesAll'])->name('hotels.invoices.all');//all invoices
    Route::get('month/invoices', [HotelController::class,'monthOfInvoices'])->name('hotels.month.invoices');
    Route::get('arrivals', [HotelController::class,'arrivals'])->name('hotels.arrivals');
    Route::get('rates', [HotelController::class,'rates'])->name('hotels.rates');
    Route::get('comments', [HotelController::class,'comments'])->name('hotels.comments');
});

    Route::post('comments/create', [HotelController::class,'comment'])->name('hotels.comments.create');
    Route::group(['prefix'=>'rooms','middleware'=> ['auth:hotel','status']], function (){

        Route::get('index',[RoomController::class,'index'])->name('rooms.index');
        Route::get('create',[RoomController::class,'create'])->name('rooms.create');
        Route::post('store',[RoomController::class,'store'])->name('rooms.store');
        Route::get('edit/{room}',[RoomController::class,'edit'])->name('rooms.edit');
        Route::get('show/{room}',[RoomController::class,'show'])->name('rooms.show');
        Route::put('update/{id}',[RoomController::class,'update'])->name('rooms.update');
        Route::delete('delete/{id}',[RoomController::class,'delete'])->name('rooms.delete');
        Route::get('calendars/show/{id}', [RoomController::class,'calendarsShow'])->name('rooms.calendars.show');
    });

    Route::group(['prefix'=>'services','middleware'=> ['auth:hotel','status']], function (){

        Route::get('create',[ServiceController::class,'create'])->name('services.create');
        Route::post('store',[ServiceController::class,'store'])->name('services.store');
        Route::get('edit/{id}',[ServiceController::class,'edit'])->name('services.edit');
        Route::put('update/{id}',[ServiceController::class,'update'])->name('services.update');


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
