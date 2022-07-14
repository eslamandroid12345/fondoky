<?php

namespace App\Http\Controllers;

use App\Models\InvoiceGuest;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {

        $invoices = InvoiceGuest::with(['hotel','user','reservation','reserved_room'])->where('user_id','=',auth()->id())->latest()->simplePaginate(Max);
        return view('users.home',compact('invoices'));
    }



}
