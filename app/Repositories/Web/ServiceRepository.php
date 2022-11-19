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


    public function store(StoreServiceRequest $request){


        try {

            $service = Service::create([

                'name' => $request->name,
                'services' => json_encode($request->services),
                'hotel_id' => auth('hotel')->id()
            ]);


            toastSuccess(__('services.create'));
            return redirect()->back();


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
            $service->update([

                'name' => $request->name,
                'services' => json_encode($request->services)

            ]);

            toastSuccess(__('services.update'));
            return redirect()->route('services.create');


        }catch (\Exception $exception){

            return returnMessageError($exception->getMessage(),Response::HTTP_INTERNAL_SERVER_ERROR);
        }


    }


}