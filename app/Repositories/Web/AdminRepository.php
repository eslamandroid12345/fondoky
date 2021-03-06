<?php


namespace App\Repositories\Web;


use App\Http\Requests\LoginAdminRequest;
use App\Http\Requests\StoreAdminRequest;
use App\Interfaces\Web\AdminRepositoryInterface;
use App\Models\Admin;
use App\Models\Hotel;
use App\Models\InvoiceGuest;
use App\Models\Role;
use App\Models\Room;
use Illuminate\Support\Facades\Hash;


class AdminRepository implements AdminRepositoryInterface
{

    public function hotel(){

        $hotels = Hotel::select(['id','name_ar','name_en','location_ar','location_en','currency_ar','currency_en','blocked'])->latest()->simplePaginate(Max);
        return view('admins.hotel',compact('hotels'));


    }


    public function rooms(){

        $rooms = Room::with(['hotel:id,name_ar,name_en','room_type:id,room_type'])->select(['id','room_type_id','adults_max','child_max','hotel_id'])
            ->orderBy('id','DESC')->simplePaginate(Max);
        return view('admins.rooms',compact('rooms'));
    }


    public function booking(){

//
//        $bookers = Booker::with(['hotel','user'])->latest()->simplePaginate(Max);
//        return view('admins.bookers',compact('bookers'));

        $invoices = InvoiceGuest::with(['hotel','user','reservation','reserved_room.room.room_type'])->latest()->simplePaginate(Max);
        return view('admins.bookers',compact('invoices'));

    }


    public function show(){

        return view('admins.login');
    }

    public function login(LoginAdminRequest $request){

        try {

            if(auth()->guard('admin')->attempt(['email' => trim($request->email," "), 'password' => trim($request->password," ")])){


                return redirect()->intended('booking/all')->with('login', __('admin.message'));


            }else{

                return redirect()->back()->withInput($request->only('email'))->with('error',__('admin.error'));
            }

        }catch (\Exception $exception){

            return  redirect()->back()->withErrors(["error" => $exception->getMessage()]);

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


            $admin = new Admin();
            $admin->name = $request->name;
            $admin->email = $request->email;
            $admin->password = Hash::make($request->password);
            $admin->phone = $request->phone;
            $admin->image =  $profileImage;
            $admin->role_id = $request->role_id;
            $admin->save();


            return redirect()->back()->with('admin',__('admin.create'));

        }catch (\Exception $exception){

            return  redirect()->back()->withErrors(["error" => $exception->getMessage()]);
        }


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