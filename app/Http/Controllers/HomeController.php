<?php

namespace App\Http\Controllers;

use App\Models\Booker;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {

        $bookers = Booker::with(['hotel','user'])->where('user_id','=',auth()->id())->latest()->simplePaginate(Max);
        return view('users.home',compact('bookers'));
    }
}
