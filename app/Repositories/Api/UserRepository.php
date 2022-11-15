<?php


namespace App\Repositories\Api;


use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Resources\UserResource;
use App\Interfaces\Api\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;


class UserRepository implements UserRepositoryInterface
{


    public function users(){


        if(Gate::allows('users',auth('admin-api')->user())){

            $users = UserResource::collection(User::orderBy('id','DESC')->get());
            return returnDataSuccess("users get all successfully",Response::HTTP_OK,"users",$users);

        }else{

            return returnMessageError(trans("auth.forbidden"),Response::HTTP_FORBIDDEN);
        }



    }

    public function register(StoreUserRequest $request){


        try {


            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->phone = $request->phone;
            $user->save();


            if($user){

                return returnDataSuccess(trans('api_user.create'),Response::HTTP_OK,"user",new UserResource($user));
            }


        }catch (\Exception $exception){


            return returnMessageError($exception->getMessage(),"500");
        }



    }


    public function login(LoginUserRequest $request){


        try {


            $token = auth()->guard('user-api')->attempt($request->only(['email','password']));


            if(!$token){


                return returnMessageError(trans('api_user.failed'),"404");
            }


            $user = new UserResource(auth()->guard('user-api')->user());
            $user->token = $token;


            return returnDataSuccess(trans('api_user.login'),Response::HTTP_OK,"user",$user);

        }catch (\Exception $exception){


            return returnMessageError($exception->getMessage(),"500");

        }

    }



    public function logout(){

        try {

            auth()->guard('user-api')->logout();

            return returnMessageSuccess(trans('api_user.logout'),"201");

        }catch (\Exception $exception){


            return returnMessageError($exception->getMessage(),Response::HTTP_INTERNAL_SERVER_ERROR);

        }

    }

}