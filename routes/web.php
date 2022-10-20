<?php


use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReservationController;
use App\Models\Room;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;//use package of language


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

    define('Max',1);
    define('Search',8);
    define('EVENT',1);
    define('COMMENT',6);
    define('ROOM',10);

 Route::group(['prefix'=>LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function(){

    Route::get('/', [UserController::class,'welcome']);
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Auth::routes();


    Route::group(['prefix'=>'users','middleware' => ['auth:admin','can:users']], function (){

        Route::get('all',[UserController::class,'index'])->name('users.all');
        Route::get('delete/{id}',[UserController::class,'delete'])->name('users.delete');
        Route::get('update/{id}',[UserController::class,'update'])->name('users.update');

    });


    Route::group(['prefix'=>'users','middleware' => ['auth']], function (){

        Route::post('rates', [UserController::class,'rates'])->name('users.rates');
        Route::get('rates/create/{id}', [UserController::class,'ratesCreate'])->name('users.rates.create');


    });

        Route::get('hotel/room/{id}', [UserController::class,'rooms'])->name('hotel.room');
        Route::get('room/reservation/{id}', [UserController::class,'reservation'])->name('room.reservation')->middleware('auth');


    Route::group(["prefix" => "reservations","middleware" => "auth"], function (){

        Route::post('store/{id}', [ReservationController::class,'store'])->name('reservations.store');
        Route::get('cancel/{id}', [ReservationController::class,'cancel'])->name('reservations.cancel');


    });



});


//start comments of query test ==================================================================================================================
//Route::get('users', function (){

    //test code of users

   //$users = DB::table('users')->get(); // query builder

//    $users = \App\Models\User::query()->chunkMap(function ($user){
//
//       return [
//
//         "id" => $user->id,
//           "name" => $user->name,
//           "email" => $user->email
//
//       ];
//
//    });


//    $users = \App\Models\User::query()->select(['id','name','email'])->get();
//    dd($users);

//});

//Route::get('count' , function (){
//
//
//    $booker = Booker::get();
//    return $booker->count();
//
//});



//Route::get('ro/{id}' , function ($id){
//
//
//
//    $room = Room::find($id);
//
//    $calendar_room = Calendar::whereBelongsTo($room)->get();
//
//
//    return $calendar_room;
//
//});



//Carbon::parse($request->date_start)->format('Y-m-d');
//Route::get('date', function (){
////
////
//////    $date = Carbon::now();
//////    $date->addDays(5);
//////    $date->format("Y-m-d");
//////    $posts = Post::where('status','=', 1)->whereDate('created_at','=', $date)->get();
//////
//////
//////    $currentDateTime = Carbon::now();
//////    $newDateTime = Carbon::now()->dayOfWeek;
//////
//////    dd($newDateTime);
////
//
////
////    $room = Room::with(['hotel','room_type','calendar' => function($query) use($date_start,$date_expire) {
////
////        $query->whereDate('check_in','<=',$date_start)->whereDate('check_out','>=',$date_expire);
////
////    }])->find($id);
//
//    $date = Carbon::createFromDate()->format('Y-m-d');
//    return $date;
//});
//


//Route::get('hotel/{id}', function ($id){
//
//
//    $dateFrom = Carbon::now()->subDays(30);
//    $dateTo = Carbon::now();
//    $monthly = \App\Models\Booker::all()->whereBetween('created_at', [$dateFrom, $dateTo])->sum('commission');
//



    //find hotel booking in this month -------------------------------------------------------------------------
//    $booking = \App\Models\Hotel::find($id)->booker()->whereMonth('created_at', date('m'))->sum('commission');
//    $booking2 = \App\Models\Booker::where('hotel_id', $id)->whereYear('created_at', date('Y'))
//        ->select(DB::raw('sum(commission) as `commission`'))
//        ->get()->groupBy(function($val) {
//            return Carbon::parse($val->created_at)->format('m');
//        });


//    $booking2 = Booker::where('hotel_id', $id)->select(DB::raw("(sum(commission)) as commission"), DB::raw("(DATE_FORMAT(created_at, '%m-%Y')) as month_year"))
//        ->orderBy('created_at')
//        ->groupBy(DB::raw("DATE_FORMAT(created_at, '%m-%Y')"))
//        ->get();
//
//      return $booking2;

  //===============================================================================================================

//    foreach ($booking2 as $booker){
//
//        echo $booker->commission . $booker->month_year . "</br>";
//    }

//});



//$to =     \Carbon\Carbon::createFromFormat('Y-m-d', $room->date_start);
//$from =   \Carbon\Carbon::createFromFormat('Y-m-d', $room->date_expire);
//$diff_in_days = $to->diffInDays($from);


//        $start = Carbon::createFromDate()->format('Y-m-d');
//        $end = Carbon::createFromDate()->format('Y-m-d');


//$dateFrom = Carbon::now()->subDays(30);
//$dateTo = Carbon::now();
//$monthly = Transaction::whereBetween('created_at', [$dateFrom, $dateTo])->sum('amount');


//Set::where('type', $type)
//    ->whereDate('active_start', '<=', date("Y-m-d"))
//    ->whereDate('active_end', '>=', date("Y-m-d"))
//    ->first();

//Route::get('month', function (){
//
//    $date = Carbon::now()->format('m');
//    return $date;
//
//});


//Route::get('check', function (){
//
//
//    $start = Carbon::now()->format('Y-m-d');
//
//    $calendar = \App\Models\Calendar::whereDate('check_in','=',$start)->get();
//    return $calendar;
//
//
//});

//sum salary between two dates
//DB::table('sales')
//    ->whereBetween('date', [$date_from, $date_to])
//    ->groupBy('date')
//    ->sum('price');

//=============================================================================================================
//Route::get('add/{id}', function ($id){
////
////
////    $reservations = Booker::query()->where('hotel_id', $id)->whereMonth('created_at', date('m'))
////        ->whereYear('created_at', date('Y'))->get();
////
////    return returnDataSuccess("reservations get successfully","200","reservations",$reservations);
////
//
//    $reservations = Booker::select(DB::raw("(sum(commission)) as commission"))
//        ->where('hotel_id', $id)
//        ->whereMonth('created_at', date('m'))
//        ->whereYear('created_at', date('Y'))
//        ->get();
//
//    return $reservations;
//});

//Route::get('check', function (){
//
//    $car = Carbon::now()->firstOfMonth()->translatedFormat('l j F Y');//first of month
//    $car_add = Carbon::now()->lastOfMonth()->translatedFormat('l j F Y');//last of month
//
//    return $car . "</br>" . $car_add;
//
//
//});


//Route::get('mm', function (){
//
//    $begin = new DateTime( "2022-01-01");
//    $end   = new DateTime( "2022-01-10");
//
//
//    $different = $begin->diff($end);
//    $days = $different->format('%a');//now do whatever you like with $days
//
//    for($i = $begin; $i <= $end; $i->modify('+1 day')){
//
//
//        echo $i->format("Y-m-d") . "=>" .  $i->modify('+1 day')->format("Y-m-d"). "</br>";
//        if($days > 1){
//            $i->modify('-1 day')->format("Y-m-d");
//        }
//
//
//
//    }


//    $diff = strtotime($begin) - strtotime($end);
//    $different =  abs(round($diff / 86400));

//    $interval = $datetime1->diff($datetime2);
//    $days = $interval->format('%a');//now do whatever you like with $days

//    $begin = new DateTime('2010-05-01');
//    $end = new DateTime('2010-05-10');
//
//    $interval = DateInterval::createFromDateString('1 day');
//    $period = new DatePeriod($begin, $interval, $end);
//
//    foreach ($period as $dt) {
//        echo $dt->format("Y-m-d") . "</br>";
//    }


//    function dateRange($first, $last, $step = '+1 day', $format = 'Y-m-d' ) {
//        $dates = [];
//        $current = strtotime($first);
//        $last = strtotime($last);
//
//        while( $current <= $last ) {
//            $dates[] = date($format, $current);
//            $current = strtotime($step, $current);
//        }
//        return $dates;
//    }
//    print_r( dateRange( '2010-07-26', '2010-08-05') );

//     'date_start' => 'required|date_format:Y-m-d|before_or_equal:date_end',
//   'date_end' => 'required|date_format:Y-m-d|after_or_equal:date_start'
//


//
//'from_date' => [
//    'before:'.Input::get('to_date') // This is what we will learn to do
//  ],
//  'to_date' => [
//    'after:'.Input::get('from_date') // Do this one on your own
//  ]
//
//
//
//    'start_date' => [ Rule::unique('reservations')->where(function($query) use ($request) {
//        $query->where('pitch_id', 'LIKE','%'.$request->pitch_id.'%');
//      })],
