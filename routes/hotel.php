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
 * hotel routes of application and any data of hotel is  here ???????????? ----
 */

Route::group(['prefix'=>LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function(){


    //hotel login and hotel register
    Route::group(['prefix' => 'hotels', 'middleware' => 'guest:hotel'], function (){

        Route::get('show',[HotelController::class,'show'])->name('hotels.show');//return view hotel login
        Route::post('login',[HotelController::class,'login'])->name('hotels.login');//check hotel when login
        Route::get('show/register',[HotelController::class,'showRegister'])->name('hotels.show.register');//return view hotel register
        Route::post('register',[HotelController::class,'register'])->name('hotels.register');//create new hotel

    });

Route::group(['prefix'=>'hotels','middleware' => ['auth:hotel','status']], function (){


    Route::get('reservations',[HotelController::class,'reservations'])->name('hotels.reservations');//return all reservations of hotel
    Route::get('block/{id}',[HotelController::class,'block'])->name('hotels.block');//return block for reservation
    Route::get('stay/{id}',[HotelController::class,'stay'])->name('hotels.stay');//return stay guest
    Route::get('all',[HotelController::class,'index'])->name('hotels.all');//return data of hotel
    Route::get('edit',[HotelController::class,'edit'])->name('hotels.edit');//return view of hotel edit data
    Route::put('update/{id}',[HotelController::class,'update'])->name('hotels.update');//return update data of hotel who authenticated
    Route::delete('delete/{id}',[HotelController::class,'delete'])->name('hotels.delete');//delete hotel
    Route::get('arrivals/pdf/{id}',[HotelController::class,'arrivalsPdf'])->name('hotels.arrivals.pdf');


    Route::get('invoices', [HotelController::class,'invoices'])->name('hotels.invoices');//invoices of hotel
    Route::get('month/invoices', [HotelController::class,'monthOfInvoices'])->name('hotels.month.invoices');//show view of hotel before come to invoices
    Route::get('arrivals', [HotelController::class,'arrivals'])->name('hotels.arrivals');//check arrivals daily of hotel
    Route::get('rates', [HotelController::class,'rates'])->name('hotels.rates');
    Route::get('comments', [HotelController::class,'comments'])->name('hotels.comments');



});

    Route::post('comments/create', [HotelController::class,'comment'])->name('hotels.comments.create');//create new comment


    Route::group(['prefix'=>'rooms','middleware'=> ['auth:hotel','status']], function (){

        Route::get('index',[RoomController::class,'index'])->name('rooms.index');//show all rooms of hotel
        Route::get('create',[RoomController::class,'create'])->name('rooms.create');//show view of create hotel
        Route::post('store',[RoomController::class,'store'])->name('rooms.store');//store new room og hotel
        Route::get('edit/{room}',[RoomController::class,'edit'])->name('rooms.edit');//show view of room
        Route::get('show/{room}',[RoomController::class,'show'])->name('rooms.show');//return view of any room of hotel
        Route::put('update/{id}',[RoomController::class,'update'])->name('rooms.update');//update any room of hotel
        Route::delete('delete/{id}',[RoomController::class,'delete'])->name('rooms.delete');//delete room of hotel
        Route::get('calendars/show/{id}', [RoomController::class,'calendarsShow'])->name('rooms.calendars.show');//show all calendars of room


    });


    Route::group(['prefix'=>'services','middleware'=> ['auth:hotel','status']], function (){

        Route::get('create',[ServiceController::class,'create'])->name('services.create');//create new service for hotel
        Route::post('store',[ServiceController::class,'store'])->name('services.store');//store services of hotel
        Route::get('edit/{id}',[ServiceController::class,'edit'])->name('services.edit');//update service of hotel
        Route::put('update/{id}',[ServiceController::class,'update'])->name('services.update');//update service of hotel


    });


    //create and store new room services
    Route::group(['prefix'=>'room-services','middleware'=> ['auth:hotel','status']], function (){


        Route::get('index',[RoomServiceController::class,'index'])->name('room-services.index');
        Route::get('create',[RoomServiceController::class,'create'])->name('room-services.create');
        Route::post('store',[RoomServiceController::class,'store'])->name('room-services.store');
        Route::get('edit/{id}',[RoomServiceController::class,'edit'])->name('room-services.edit');
        Route::put('update/{id}',[RoomServiceController::class,'update'])->name('room-services.update');
        Route::get('delete/{id}',[RoomServiceController::class,'delete'])->name('room-services.delete');


    });



    Route::group(['prefix'=>'hotel-room-services','middleware'=> ['auth:hotel','status']], function (){


        Route::get('create',[HotelServiceRoomController::class,'create'])->name('hotel-room-services.create');
        Route::post('store',[HotelServiceRoomController::class,'store'])->name('hotel-room-services.store');

    });


    //start events of rooms in hotel
   Route::group(['prefix'=>'calendars','middleware'=> ['auth:hotel','status']], function (){

       Route::get('create/{id}', [EventController::class, 'create'])->name('calendars.create');
       Route::post('store', [EventController::class, 'store'])->name('calendars.store');
       Route::get('edit/{id}', [EventController::class, 'edit'])->name('calendars.edit');
       Route::put('update/{id}', [EventController::class, 'update'])->name('calendars.update');
       Route::get('destroy/{id}', [EventController::class, 'destroy'])->name('calendars.destroy');

    });


});

