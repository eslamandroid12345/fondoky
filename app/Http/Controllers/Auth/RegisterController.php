<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    protected $redirectTo = RouteServiceProvider::HOME;


    public function __construct()
    {
        $this->middleware('guest');
    }


    protected function validator(array $data)
    {

        return Validator::make($data,[

            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone' => ['required', 'max:255'],

        ],[

            'name.required' => trans('user_create.name'),
            'name.string' => trans('user_create.string'),
            'name.max' => trans('user_create.max'),
            'email.required' => trans('user_create.email'),
            'email.email' => trans('user_create.email_ok'),
            'email.unique' => trans('user_create.unique'),
            'password.required' => trans('user_create.password'),
            'password.min' => trans('user_create.min'),
            'password.confirmed' => trans('user_create.confirmed'),
            'phone.required' => trans('user_create.phone'),


        ]);
    }



    protected function create(array $data)
    {
        return User::create([

            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'phone' => $data['phone'],

        ]);
    }


//    public function registerUser(Request $request){
//
//        $validator = Validator::make($request->all(),[
//
//            'name' => ['required', 'string', 'max:255'],
//            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
//            'password' => ['required', 'string', 'min:8', 'confirmed'],
//            'phone' => ['required', 'max:255'],
//
//        ],[
//
//            'name.required' => trans('user_create.name'),
//            'name.string' => trans('user_create.string'),
//            'name.max' => trans('user_create.max'),
//            'email.required' => trans('user_create.email'),
//            'email.email' => trans('user_create.email_ok'),
//            'email.unique' => trans('user_create.unique'),
//            'password.required' => trans('user_create.password'),
//            'password.min' => trans('user_create.min'),
//            'password.confirmed' => trans('user_create.confirmed'),
//            'phone.required' => trans('user_create.phone'),
//
//        ]);
//
//        if ($validator->fails()) {
//            return redirect()->back()
//                ->withErrors($validator)
//                ->withInput();
//        }
//
//        User::create([
//            'name' => $request->name,
//            'email' => $request->email,
//            'password' => Hash::make($request->password),
//            'phone' => $request->phone,
//        ]);
//
//        auth()->attempt($request->only('email', 'password'));
//        Session::flash('success_register','User registration successfully');
//        return redirect()->route('home');
//    }
}
