<?php


namespace App\Repositories\Api;


use App\Http\Requests\LoginAdminRequest;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Resources\AdminResource;
use App\Interfaces\Api\AdminRepositoryInterface;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;


class AdminRepository implements AdminRepositoryInterface
{


    public function login(LoginAdminRequest $request){


        try {

            $token = auth()->guard('admin-api')->attempt($request->only(['email','password']));


            if(!$token){


                return returnMessageError(trans('api_user.failed'),Response::HTTP_NOT_FOUND);
            }


            $admin = new AdminResource(auth()->guard('admin-api')->user());
            $admin->token = $token;

            return returnDataSuccess(trans('api_user.login'),Response::HTTP_OK,"admin",$admin);


        }catch (\Exception $exception){


            return returnMessageError($exception->getMessage(),"500");
        }


    }



    public function register(StoreAdminRequest $request){



        try {

                //create image for admin
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
                $admin->image = $profileImage;
                $admin->role_id = $request->role_id;
                $admin->save();


                return returnDataSuccess(__('admin.create'), Response::HTTP_OK, "admin", new AdminResource($admin));

            } catch (\Exception $exception) {

                return returnMessageError($exception->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);

            }

      }


    public function logout(){


        try {

            auth()->guard('admin-api')->logout();

            return returnMessageSuccess(trans('api_user.logout_admin'),Response::HTTP_OK);

        }catch (\Exception $exception){


            return returnMessageError($exception->getMessage(),Response::HTTP_INTERNAL_SERVER_ERROR);

        }

    }

}