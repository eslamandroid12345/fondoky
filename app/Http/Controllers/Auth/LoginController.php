<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;


    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');


    }

    public function username()
    {
        $value = request()->input('any');
        $key = filter_var($value, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';
        request()->merge([$key => $value]);
        return $key;
    }

    protected function credentials(Request $request)
    {
        return [

            'email' => $request->{$this->username()},
            'password' => $request->password,
            'blocked' => 1,
        ];

    }


    public function loginUser(Request $request){

        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required'
        ]);

        if(auth()->attempt(['email' => trim($request->email," "), 'password' => trim($request->password," "),'blocked' => 1])){

            return redirect()->route('home')->with('success_login','user login successfully');

        }else{
            return redirect()->back()->withInput($request->only('email'))->with('loginFailed',trans('admin.error'));
        }
    }
    /*
    * @override of logout
    */

    public function logout(Request $request)
    {

        if (auth()->guard('admin')->check()) {

            auth()->guard('admin')->logout();//logout admin
            $redirect = 'admins/show';

        } elseif (auth()->guard('hotel')->check()) {

            auth()->guard('hotel')->logout();//logout hotel
            $redirect = 'hotels/show';
        } else {

            auth()->logout();//logout user
            $redirect = '/';
        }

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect($redirect);
    }//end of function login

}//end of class
