<?php


namespace App\Repositories\Web;


use App\Http\Requests\LoginSupervisorRequest;
use App\Http\Requests\StoreSupervisorRequest;
use App\Interfaces\Web\SupervisorRepositoryInterface;
use App\Models\Supervisor;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Hash;

class SupervisorRepository implements SupervisorRepositoryInterface
{

    public function show(){

        return view('supervisors.login');

    }

    public function login(LoginSupervisorRequest $request){


        try {

            if(auth()->guard('supervisor')->attempt(['email' => $request->email, 'password' => $request->password , 'status' => 1])){


                return redirect()->intended(RouteServiceProvider::SUPERVISOR)->with('login', __('supervisor.message'));

            }else{

                return redirect()->back()->withInput($request->only('email'))->with('error',__('supervisor.error'));
            }

        }catch (\Exception $exception){

            return  redirect()->back()->withErrors(["error" => $exception->getMessage()]);

        }

    }

    public function create(){


        return view('supervisors.register');

    }

    public function store(StoreSupervisorRequest $request){


        try {

            //create image for supervisor
            if ($image = $request->file('image')) {

                $destinationPath = 'supervisors/';
                $profileImage = time() . rand(1000,20000) . uniqid() . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $profileImage);
                $request['image'] = "$profileImage";
            }


            $supervisor = new Supervisor();
            $supervisor->name = $request->name;
            $supervisor->email = $request->email;
            $supervisor->password = Hash::make($request->password);
            $supervisor->phone = $request->phone;
            $supervisor->address = $request->address;
            $supervisor->num_of_branches = $request->num_of_branches;
            $supervisor->image =  $profileImage;
            $supervisor->admin_id = $request->admin_id;
            $supervisor->save();


            return redirect()->back()->with('supervisor',__('supervisor.create'));

        }catch (\Exception $exception){

            return  redirect()->back()->withErrors(["error" => $exception->getMessage()]);
        }

    }

    public function home(){


        return view('supervisors.home');


    }


    public function supervisors()
    {
        // TODO: Implement supervisors() method.

        $supervisors = Supervisor::with(['admin:id,name'])->select('id','name','status','num_of_branches')->simplePaginate(Max);

        return view('supervisors.all',compact('supervisors'));
    }
}