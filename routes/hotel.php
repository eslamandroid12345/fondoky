<?php

use App\Http\Controllers\CalendarController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\HotelServiceRoomController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\RoomServiceController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;//use package of translation


Route::group(['prefix'=>LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function(){



    Route::get('hotels/show',[HotelController::class,'show'])->name('hotels.show')->middleware('guest:hotel');//return view hotel login
    Route::post('hotels/login',[HotelController::class,'login'])->name('hotels.login');
    Route::get('hotels/show/register',[HotelController::class,'showRegister'])->name('hotels.show.register');//return view hotel register
    Route::post('hotels/register',[HotelController::class,'register'])->name('hotels.register');


Route::group(['prefix'=>'hotels','middleware' => ['auth:hotel','status']], function (){


    Route::post('room/type',[HotelController::class,'room_type'])->name('hotels.room.type');//return room type save
    Route::get('room/type/create',[HotelController::class,'room_type_create'])->name('hotels.room.type.create');//return room type create
    Route::get('room/type/index',[HotelController::class,'room_type_index'])->name('hotels.room.type.index');//return room type index
    Route::get('reservations',[HotelController::class,'reservations'])->name('hotels.reservations');//return all reservations
    Route::get('block/{id}',[HotelController::class,'block'])->name('hotels.block');//return block for reservation
    Route::get('stay/{id}',[HotelController::class,'stay'])->name('hotels.stay');//return stay quest
    Route::get('all',[HotelController::class,'index'])->name('hotels.all');//return view hotel register
    Route::get('edit',[HotelController::class,'edit'])->name('hotels.edit');
    Route::put('update/{id}',[HotelController::class,'update'])->name('hotels.update');
    Route::delete('delete/{id}',[HotelController::class,'delete'])->name('hotels.delete');


    Route::get('invoices', [HotelController::class,'invoices'])->name('hotels.invoices');
    Route::get('month/invoices', [HotelController::class,'monthOfInvoices'])->name('hotels.month.invoices');
    Route::get('arrivals', [HotelController::class,'arrivals'])->name('hotels.arrivals');
    Route::get('home', [HotelController::class,'home'])->name('hotels.home');




});


    Route::group(['prefix'=>'rooms','middleware'=> ['auth:hotel','status']], function (){

        Route::get('index',[RoomController::class,'index'])->name('rooms.index');
        Route::get('create',[RoomController::class,'create'])->name('rooms.create');
        Route::post('store',[RoomController::class,'store'])->name('rooms.store');
        Route::get('edit/{room}',[RoomController::class,'edit'])->name('rooms.edit');
        Route::get('show/{room}',[RoomController::class,'show'])->name('rooms.show');
        Route::put('update/{id}',[RoomController::class,'update'])->name('rooms.update');
        Route::delete('delete/{id}',[RoomController::class,'delete'])->name('rooms.delete');
        Route::get('calendars/show/{id}', [RoomController::class,'calendarsShow'])->name('rooms.calendars.show');

        //room units
        Route::get('units/create', [RoomController::class,'unitCreate'])->name('rooms.units.create');
        Route::post('units/store', [RoomController::class,'unitStore'])->name('rooms.units.store');


    });


    Route::group(['prefix'=>'services','middleware'=> ['auth:hotel','status']], function (){

        Route::get('create',[ServiceController::class,'create'])->name('services.create');
        Route::post('store',[ServiceController::class,'store'])->name('services.store');
        Route::get('edit/{room}',[ServiceController::class,'edit'])->name('services.edit');
        Route::get('show/{room}',[ServiceController::class,'show'])->name('services.show');
        Route::put('update/{id}',[ServiceController::class,'update'])->name('services.update');


    });




    //start calendars for room hotels
    Route::group(['prefix'=>'calendars','middleware'=> ['auth:hotel','status']], function (){

        Route::get('create/{id}',[CalendarController::class,'create'])->name('calendars.create');
        Route::post('store',[CalendarController::class,'store'])->name('calendars.store');
        Route::get('edit/{id}',[CalendarController::class,'edit'])->name('calendars.edit');
        Route::put('update/{id}',[CalendarController::class,'update'])->name('calendars.update');
        Route::get('delete/{id}',[CalendarController::class,'delete'])->name('calendars.delete');
        Route::get('today/{id}', [CalendarController::class,'toDay'])->name('calendars.today');

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



    //many to many relation of room services with rooms
    Route::group(['prefix'=>'hotel-room-services','middleware'=> ['auth:hotel','status']], function (){


        Route::get('create',[HotelServiceRoomController::class,'create'])->name('hotel-room-services.create');
        Route::post('store',[HotelServiceRoomController::class,'store'])->name('hotel-room-services.store');

    });




});
