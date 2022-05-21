<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Booker;
use App\Models\Hotel;
use App\Models\Role;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{


    public function hotel(){

        $hotels = Hotel::select(['id','name_ar','name_en','location_ar','location_en','country','pound','blocked'])->latest()->simplePaginate(Max);
        return view('admins.hotel',compact('hotels'));
    }


    public function rooms(){

        $rooms = Room::with(['hotel:id,name_ar,name_en','room_type:id,room_type'])
            ->select(['id','room_type_id','adults_max','child_max','hotel_id'])
            ->orderBy('id','DESC')->simplePaginate(Max);
        return view('admins.rooms',compact('rooms'));
    }


    public function booking(){


        $bookers = Booker::with(['hotel','user'])->latest()->simplePaginate(Max);
        return view('admins.bookers',compact('bookers'));
    }


    public function show(){

        return view('admins.login');
    }

    public function login(Request $request){

        $rules = [

            'email' => 'required|email',
            'password' => 'required',
        ];

        $message = [

            'email.required' => __('admin.email'),
            'email.email' => __('admin.email_ok'),
            'password.required' => __('admin.password')
        ];


        $validator = Validator::make($request->all(),$rules,$message);

        if($validator->fails()){

            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }



        if(auth()->guard('admin')->attempt(['email' => $request['email'], 'password' => $request['password']])){


            return redirect()->intended('admins/hotel')->with('login', __('admin.message'));

        }else{

            return redirect()->back()->withInput($request->only('email'))->with('error',__('admin.error'));
        }

    }


    /*
     *
     * create new admin in dashboard
     *
     */

    public function create(){

        $roles = Role::select('id','name')->get();
        return view('admins.register',compact('roles'));
    }


    public function store(Request $request){


        $rules = [

            'name' => 'required',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required',
            'phone' => 'required|numeric',
            'image' => 'required',
            'role_id' => 'required|exists:roles,id'
        ];

        $message = [

            'name.required' => __('admin.name'),
            'email.required' => __('admin.email'),
            'email.email' => __('admin.email_ok'),
            'password.required' => __('admin.password'),
            'phone.required' => __('admin.phone'),
            'password.numeric' => __('admin.numeric'),
            'image.required' => __('admin.image'),
            'role_id.required' => __('admin.role_id'),
            'role_id.exists' => __('admin.exists')
        ];


        $validator = Validator::make($request->all(),$rules,$message);

        if($validator->fails()){

            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        if ($image = $request->file('image')) {

            $destinationPath = 'admins/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $request['image'] = "$profileImage";
        }

        //create new admin with permissions
        $admin = Admin::create([

            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'phone' => $request['phone'],
            'image' => $profileImage,
             'role_id' => $request['role_id'],

        ]);


        return redirect()->back()->with('admin',__('admin.create'));

    }


    public function index(){

        $admins = Admin::where('id','<>',admin()->id)->latest()->simplePaginate(Max);
        return view('admins.index',compact('admins'));

    }


    public function active_hotels($id){


        $hotel = Hotel::findOrFail($id);
        $hotel->update(['blocked' => $hotel->blocked == 1 ? 0 : 1]);


        return redirect()->back()->with('active',__('hotels.active'));

    }



}
