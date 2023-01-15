<?php

namespace App\Repositories\Web;
use App\Http\Requests\LoginAdminRequest;
use App\Http\Requests\StoreAdminRequest;
use App\Interfaces\Web\AdminRepositoryInterface;
use App\Models\Admin;
use App\Models\Hotel;
use App\Models\Reservation;
use App\Models\Role;
use App\Models\Room;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;


class AdminRepository implements AdminRepositoryInterface{


    public function hotel(){

        $hotels = Hotel::select(['id','name_ar','name_en','location_ar','location_en','currency_ar','currency_en','blocked'])->latest()->get();
        return view('admins.hotel',compact('hotels'));


    }

    public function booking(){

        $invoices = Reservation::latest()->get();
        return view('admins.bookers',compact('invoices'));

    }


    public function show(){

        return view('admins.login');
    }

    public function login(LoginAdminRequest $request){

        try {

            if(auth()->guard('admin')->attempt(['email' => trim($request->email," "), 'password' => trim($request->password," ")])){

                toastr()->success(__('admin.message'));return redirect()->intended('booking/all');

            }else{

                toastr()->error(__('admin.error'));
                return redirect()->back()->withInput($request->only('email'));
            }

        }catch (\Exception $exception){

            return returnMessageError($exception->getMessage(),Response::HTTP_INTERNAL_SERVER_ERROR);

        }


    }


    public function create(){

        $roles = Role::select('id','name')->get();
        return view('admins.register',compact('roles'));
    }


    public function store(StoreAdminRequest $request){


        try {

            if ($image = $request->file('image')) {

                $destinationPath = 'admins/';
                $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $profileImage);
                $request['image'] = "$profileImage";
            }


            $admin = Admin::create([

            'name' =>  $request->name,
            'email' =>  $request->email,
            'password' =>  Hash::make($request->password),
            'phone' =>  $request->phone,
            'image' =>   $profileImage,
            'role_id' =>  $request->role_id,

            ]);


            toastr()->success(__('admin.create'));
            return redirect()->route('admins.index');

        }catch (\Exception $exception){

            return returnMessageError($exception->getMessage(),Response::HTTP_INTERNAL_SERVER_ERROR);
        }


    }

    public function index(){

        $admins = Admin::query()->where('id','<>',admin()->id)->latest()->get();
        return view('admins.index',compact('admins'));

    }

    public function active_hotels($id){


        $hotel = Hotel::findOrFail($id);
        $hotel->update([
            'blocked' => $hotel->blocked == 1 ? 0 : 1

        ]);

        toastr()->success(__('hotels.active'));return redirect()->back();

    }

}
