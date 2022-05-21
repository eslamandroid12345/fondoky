<?php


namespace App\Http\Controllers;
use App\Models\Booker;
use App\Models\Hotel;
use App\Models\Report;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CommissionController extends Controller
{

    public function commissions(){


        $hotels = Hotel::query()->select('id','name_ar','name_en','blocked')->simplePaginate(Max);
        return view('admins.hotel_report',compact('hotels'));
    }


    //group by month for admin and hotel
    public function index($id){


         $hotel = Hotel::query()->select('id','name_ar','name_en','pound')->find($id);

         $commissions =  Report::query()->where('hotel_id', $id)
             ->where('blocked','=',true)
             ->select(DB::raw("(sum(commission)) as commission"),DB::raw("(sum(total)) as total"), DB::raw("(DATE_FORMAT(created_at, '%m-%Y')) as month_year"))
            ->orderBy('created_at')
            ->groupBy(DB::raw("DATE_FORMAT(created_at, '%m-%Y')"))
            ->get();

         return view('admins.commission',compact('commissions','hotel'));



    }



    //total and commission for admin
    public function commissionOfMonth($id){


        $hotel = Hotel::query()->findOrFail($id);

        $bookers = Booker::query()->where('hotel_id', $id)->whereMonth('created_at', date('m'))
            ->whereYear('created_at', date('Y'))->get();

        $commissions = Booker::query()
            ->where('hotel_id', $id)
            ->whereMonth('created_at', date('m'))
            ->whereYear('created_at', date('Y'))
            ->select(DB::raw("(sum(commission)) as commission"))
            ->get();


        $totals = Booker::query()
            ->where('hotel_id', $id)
            ->whereMonth('created_at', date('m'))
            ->whereYear('created_at', date('Y'))
            ->select(DB::raw("(sum(total)) as total"))
            ->get();



        $now = Carbon::now()->translatedFormat('F Y');//now

        return view('admins.month',compact('hotel','bookers','commissions','totals','now'));

    }

}
