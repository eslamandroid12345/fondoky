<?php


namespace App\Repositories\Web;


use App\Interfaces\Web\CommissionRepositoryInterface;
use App\Models\Hotel;
use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommissionRepository implements CommissionRepositoryInterface
{


    public function commissions(Request $request){

        if($request->has("name_ar") ||$request->has("name_en")){

            $hotels = Hotel::query()->select('id','name_ar','name_en','blocked','currency_ar','currency_en')
                ->where('name_ar','=', $request->name_ar)
                ->orWhere('name_en','=', $request->name_en)
                ->get();

        }else{

            $hotels = Hotel::query()->select('id','name_ar','name_en','blocked','currency_ar','currency_en')->simplePaginate(2);

        }
        return view('admins.hotel_report',compact('hotels'));

    }


    public function index($id){


        $hotel = Hotel::select('id','name_ar','name_en','currency_ar','currency_en')->find($id);

        $commissions =   $hotel->reservations()
            ->select(DB::raw("(sum(commission)) as commission"),DB::raw("(sum(total)) as total"), DB::raw("(DATE_FORMAT(check_in, '%m-%Y')) as month_year"))
            ->orderBy('check_in')
            ->groupBy(DB::raw("DATE_FORMAT(check_in, '%m-%Y')"))
            ->get();

        return view('admins.commission',compact('commissions','hotel'));


    }



    public function commissionOfMonth($id){


        $hotel = Hotel::findOrFail($id);

        $invoices =  Reservation::with('hotel','user','room')->where('hotel_id','=',$id)
            ->whereMonth('check_in', date('m'))->whereYear('check_in', date('Y'))->get();

        $commissions =   Reservation::with('hotel','user','room')
            ->where('hotel_id','=',$id)
            ->whereMonth('check_in', date('m'))->whereYear('check_in', date('Y'))
            ->select(DB::raw("(sum(commission)) as commission"),DB::raw("(sum(total)) as total"))
            ->get();


        $now = Carbon::now()->translatedFormat('F Y');

        return view('admins.month',compact('invoices','commissions','now','hotel'));

    }

}