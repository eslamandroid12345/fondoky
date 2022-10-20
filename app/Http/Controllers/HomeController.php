<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(){


        try {

            $reservations = Reservation::with(['hotel:id,name_ar,name_en,location_ar,location_en','user:id,name,phone','room:id,room_type'])
                ->where('user_id','=',auth()->id())->latest()->simplePaginate(Max);

            return view('users.home',compact('reservations'));

        }catch (\Exception $exception){

            return returnMessageError($exception->getMessage(),Response::HTTP_INTERNAL_SERVER_ERROR);

        }

    }



}
