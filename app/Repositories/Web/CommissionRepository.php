<?php


namespace App\Repositories\Web;


use App\Interfaces\Web\CommissionRepositoryInterface;
use App\Models\Booker;
use App\Models\Hotel;
use App\Models\Report;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class CommissionRepository implements CommissionRepositoryInterface
{


    public function commissions(){

        $hotels = Hotel::select('id','name_ar','name_en','blocked','currency_en')->simplePaginate(Max);
        return view('admins.hotel_report',compact('hotels'));

    }


    public function index($id){


        $hotel = Hotel::select('id','name_ar','name_en','pound','currency_en')->find($id);

        $commissions =  Report::query()->where('hotel_id', $id)
            ->where('blocked','=',true)
            ->select(DB::raw("(sum(commission)) as commission"),DB::raw("(sum(total)) as total"),
                DB::raw("(DATE_FORMAT(created_at, '%m-%Y')) as month_year"))
            ->orderBy('created_at')
            ->groupBy(DB::raw("DATE_FORMAT(created_at, '%m-%Y')"))
            ->get();

        return view('admins.commission',compact('commissions','hotel'));



    }



    public function commissionOfMonth($id){


        $hotel = Hotel::findOrFail($id);

        $bookers = Booker::where('hotel_id', $id)->whereMonth('created_at', date('m'))
            ->whereYear('created_at', date('Y'))->get();


        $commissions = Booker::where('hotel_id', $id)->whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))
            ->select(DB::raw("(sum(commission)) as commission"))
            ->get();


        $totals = Booker::where('hotel_id', $id)->whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))
            ->select(DB::raw("(sum(total)) as total"))
            ->get();



        $now = Carbon::now()->translatedFormat('F Y');

        return view('admins.month',compact('hotel','bookers','commissions','totals','now'));

    }

}