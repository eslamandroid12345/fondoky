<?php


namespace App\Repositories\Web;
use App\Http\Requests\StoreServiceRequest;
use App\Interfaces\Web\ServiceRepositoryInterface;
use App\Models\Service;
use Symfony\Component\HttpFoundation\Response;

class ServiceRepository implements ServiceRepositoryInterface
{


    public function create()
    {
        $service = Service::where('hotel_id','=',hotel()->id)->get();
        return view('services.create',compact('service'));
    }


    public function store(StoreServiceRequest $request)
    {


        try {

            $service = new Service();
            $service->name = $request->name;
            $service->services = json_encode($request->services);
            $service->hotel_id = hotel()->id;
            $service->save();


            return redirect()->back()->with('create', __('services.create'));


        }catch (\Exception $exception){

            return returnMessageError($exception->getMessage(),Response::HTTP_INTERNAL_SERVER_ERROR);
        }



    }


    public function edit($id)
    {

        $service = Service::findOrFail($id);

        return view('services.edit', compact('service'));

    }


    public function update(StoreServiceRequest $request, $id)
    {


        try {

            $service = Service::findOrFail($id);
            $service->name = $request->name;
            $service->services = json_encode($request->services);
            $service->save();

            return redirect()->route('services.create')->with('update_service', __('services.update'));


        }catch (\Exception $exception){

            return returnMessageError($exception->getMessage(),Response::HTTP_INTERNAL_SERVER_ERROR);
        }


    }


}