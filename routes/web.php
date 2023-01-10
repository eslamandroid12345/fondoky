<?php


use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReservationController;
use App\Models\Hotel;
use App\Models\Invoice;
use App\Models\Reservation;
use App\Models\Room;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Validator;
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

 Route::group(['prefix'=>LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function(){

    Route::get('/', 'UserController@welcome');
    Route::get('/home', 'HomeController@index')->name('home');
    Auth::routes();

    Route::group(['prefix'=>'users','middleware' => ['auth:admin','can:users']], function (){

        Route::get('all','UserController@index')->name('users.all');
        Route::get('delete/{id}','UserController@delete')->name('users.delete');
        Route::get('update/{id}','UserController@update')->name('users.update');
    });

    Route::group(['prefix'=>'users','middleware' => ['auth']], function (){
        Route::post('rates', 'UserController@rates')->name('users.rates');
        Route::get('rates/create/{id}', 'UserController@ratesCreate')->name('users.rates.create');

    });

        Route::get('hotel/room/{id}', 'UserController@rooms')->name('hotel.room');
        Route::get('room/reservation/{id}', 'UserController@reservation')->name('room.reservation')->middleware('auth');

    Route::group(["prefix" => "reservations","middleware" => "auth"], function (){
        Route::post('store/{id}', 'ReservationController@store')->name('reservations.store');
        Route::get('cancel/{id}', 'ReservationController@cancel')->name('reservations.cancel');

    });


});


 /*
  *  $ids = $request->ids;
    DB::table("products")->whereIn('id',explode(",",$ids))->delete();
    return response()->json(['success'=>"Products Deleted successfully."]);
  */
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

//$rules = [
//    'phone_code' => 'required',
//    'phone'      => 'required|exists:users,phone',
//    'user_type'  => 'required',
//];
//$validator = Validator::make($request->all(), $rules, [
//
//    'phone.exists' => 406,
//]);
//
//if ($validator->fails()) {
//
//    $errors = collect($validator->errors())->flatten(1)[0];
//
//    if (is_numeric($errors)) {
//
//        $errors_arr = [
//
//            406 => 'Failed,phone not found',
//
//        ];
//        $code = collect($validator->errors())->flatten(1)[0];
//        return helperJson(null, isset($errors_arr[$errors]) ? $errors_arr[$errors] : 500, $code);
//    }
//    return response()->json(['data' => null, 'message' => $validator->errors(), 'code' => 422], 200);
//}



//================================================================ Ajax ============================================================
//<script>
//$(document).ready(function () {
//
//    $('select[name="Grade_id"]').on('change', function () {
//
//        var Grade_id = $(this).val();
//        if (Grade_id) {
//            $.ajax({
//               url: "{{ URL::to('classes') }}/" + Grade_id,
//               type: "GET",
//               dataType: "json",
//                success: function (data) {
//                $('select[name="Class_id"]').empty();
//                $.each(data, function (key, value) {
//                    $('select[name="Class_id"]').append('<option value="' + key + '">' + value + '</option>');
//                });
//            },
//                            });
//                        } else {
//            console.log('AJAX load did not work');
//        }
//    });
//});
//
//</script>
//http://localhost/fondoky-master/ar?adults_max=2&child_max=1&date_expire=2022-12-03&date_start=2022-12-01&location_ar=%D8%AC%D8%A7%D9%85%D8%B9%D8%A9%20%D8%A7%D9%84%D9%82%D8%A7%D9%87%D8%B1%D8%A9%D8%8C%20%D8%B4%D8%A7%D8%B1%D8%B9%20%D8%A7%D9%84%D8%AC%D8%A7%D9%85%D8%B9%D8%A9%D8%8C%20%D9%85%D8%B5%D8%B1


/*
 *
 * //            $rooms = Room::whereDoesntHave('calendars', function ($query) {
//
//                $query->where('room_number', '=', 0);})
//
//                ->whereHas('calendars',function ($query) use($request) {
//
//                $query->whereBetween('check_in',[$request->date_start,$request->date_expire])
//
//                    ->whereDate('check_in','!=',$request->date_expire);
//
//            })->whereHas('hotel', function ($query) use($request){
//
//                $query->where('location_ar', 'like', '%' . $request->location_ar . '%')
//
//                    ->orWhere('location_en', 'like', '%' . $request->location_en . '%');
//
//            })->where('adults_max', '=', $request->adults_max)->where('child_max', '=', $request->child_max)
//
//                ->with(['calendars' => function($query) use($request){
//
//                $query->whereBetween('check_in',[$request->date_start,$request->date_expire])
//
//                    ->whereDate('check_in','!=',$request->date_expire)
//
//                    ->select('id','room_id','room_number','check_in','check_out','room_price');
//
//                 },'hotel' => function($query){
//
//                $query->where('blocked','=',true)->select('id','name_ar','name_en','location_ar','location_en', 'currency_ar','currency_en','hotel_photos');
//
//            }])->select('id','adults_max','child_max','images','room_type','hotel_id')->get();
//
 */


//Route::get('re', function (){



//    $commission = Reservation::where('hotel_id','=',4)->whereMonth('check_in','=',date('m'))->sum('commission');
//
//
//    return $commission;
//    return $commission->sum('commission');


//    $date = Carbon::now()->addDays(2)->format('Y-m-d');

//    echo $date;


//
//    $firstDayofPreviousMonth = Carbon::now()->startOfMonth()->toDateString();
//    $lastDayofPreviousMonth = Carbon::now()->endOfMonth()->toDateString();
//
//    echo $firstDayofPreviousMonth . '---' . $lastDayofPreviousMonth;

//    $lastDayofPreviousMonth = now()->parse('2022-12-16')->addDays(1)->toDateString();

//
//    $invoices = Invoice::query()->whereMonth('created_at',date('m'))
//        ->where('status','=','not_paid')->where('amount','>',0)->orderByDesc('amount')->get();
//
//    return $invoices;

//    $lastDayofPreviousMonth = Carbon::now()->endOfMonth()->addDays(10)->toDateString();

//    $hotels = Hotel::whereHas('invoices', function ($invoice){
//
//        $invoice->where('date_of_end','=', Carbon::now()->format('Y-m-d'))->where('status','=','not_paid')->where('amount','>',0);
//
//    })->where('blocked','=',1)->pluck('id');
//
//    foreach ($hotels as $id){
//
//        Hotel::where('id','=',$id)->update([
//
//            'blocked' => 0
//        ]);
//    }
////    return $hotels;
////    return $lastDayofPreviousMonth;
//    return "success";

//public function __construct()
//{
//    $this->middleware('jwt')->only('logout', 'getProfile', 'insert_token', 'updateProfile');
//}//end fun
//});


