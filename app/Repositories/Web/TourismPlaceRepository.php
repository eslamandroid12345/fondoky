<?php

namespace App\Repositories\Web;

use App\Interfaces\Web\TourismPlaceRepositoryInterface;
use App\Models\City;
use App\Models\Country;
use App\Models\TourismPlace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class TourismPlaceRepository implements TourismPlaceRepositoryInterface {


    public function countries(){

        $countries = Country::select("id","name","created_at")->get();

        return view("tourism-places.countries.index",compact("countries"));
    }

    public function cities(){

        $cities = City::with("country:id,name")->select("id","name","country_id","created_at")->get();
        return view("tourism-places.cities.index",compact("cities"));

    }

    public function tourism_places_all(){

        $tourismPlaces =  TourismPlace::with("city:id,name,country_id")
            ->select( "id","name_ar", "name_en", "images", "location_ar", "location_en", "description", "city_id")->get();
        return view("tourism-places.tourism-place.index",compact("tourismPlaces"));

    }

    public function tourism_places_details($id){

        $tourismPlace =  TourismPlace::with("city:id,name,country_id")
            ->select( "name_ar", "name_en", "images", "location_ar", "location_en", "description", "city_id")
            ->where('id','=',$id)->first();

        if(!$tourismPlace){

            abort(404);
        }

         return view("tourism-places.tourism-place.details",compact("tourismPlace"));
    }

    public function country_create(){

        return view('tourism-places.countries.create');
    }
    public function city_create(){

        $countries = Country::select("id","name")->get();

        return view('tourism-places.cities.create',compact('countries'));


    }
    public function tourism_place_create(){

        $countries = Country::select("id","name")->get();
        $cities = City::with("country:id,name")->select("id","name","country_id")->get();


        return view('tourism-places.tourism-place.create',compact('cities','countries'));

    }
    public function country_store(Request $request){

        try {

            $rules = [
                "name" => "required|string|unique:countries,name"
            ];

            $message = [
                "name.required" => trans("tourism_place.country_name_required"),
                "name.string" => trans("tourism_place.country_name_string"),
                "name.unique" => trans("tourism_place.country_name_unique"),

            ];

            $validator = Validator::make($request->all(),$rules,$message);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)
                    ->withInput();
            }

            Country::create([
                'name' => $request->name

            ]);

            Session::flash('country_add',trans("tourism_place.country_message_success_store"));
            return redirect()->route("tourism-places.countries");

        }catch (\Exception $exception){

            return response()->json(['message' => $exception->getMessage(),'code' => 500]);
        }


    }

    public function city_store(Request $request){

        try {

            $rules = [
                "name" => "required|string|unique:cities,name",
                "country_id" => "required|exists:countries,id"
            ];

            $message = [
                "name.required" => trans("tourism_place.city_name_required"),
                "name.string" => trans("tourism_place.city_name_string"),
                "country_id.required" => trans("tourism_place.country_id_required"),
                "country_id.exists" => trans("tourism_place.country_id_exists"),
                "name.unique" => trans("tourism_place.city_name_unique")

            ];

            $validator = Validator::make($request->all(),$rules,$message);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

           $city = City::create([
                'name' => $request->name,
                'country_id' => $request->country_id

            ]);

            if(isset($city)){

                Session::flash('city_add',trans("tourism_place.city_success_store"));
                return redirect()->route("tourism-places.cities");

            }else{

                return redirect()->back()->with(['errors' => 'يوجد خطاء ما اثناء دخول البيانات']);
            }

        }catch (\Exception $exception){

            return response()->json(['message' => $exception->getMessage(),'code' => 500]);

        }
    }


    public function tourism_place_store(Request $request){

        try {

            $rules = [
                "name_ar" => "required",
                "name_en" => "required",
                "location_ar" => "required",
                "location_en" => "required",
                 "images" => "required|array|min:1",
                'image.*' => 'mimes:jpg,png,jpeg|max:4096',
                "description" => "required",
                "city_id" => "required|exists:cities,id"
            ];

            $message = [

                "name_ar.required" => trans("tourism_place.tourism_place_name_ar_required"),
                "name_en.required" => trans("tourism_place.tourism_place_name_en_required"),
                "location_ar.required" => trans("tourism_place.tourism_place_location_ar_required"),
                "location_en.required" => trans("tourism_place.tourism_place_location_en_required"),
                "images.required" => trans("tourism_place.tourism_place_images_required"),
                "images.array" => trans("tourism_place.tourism_place_images_array_required"),
                "images.mimes" => trans("tourism_place.tourism_place_mimes_required"),
                "description.required" => trans("tourism_place.tourism_place_description_required"),
                "city_id.exists" => trans("tourism_place.tourism_place_city_id_exists_required"),
                "city_id.required" => trans("tourism_place.tourism_place_city_id_required"),

            ];

            $validator = Validator::make($request->all(),$rules,$message);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $data = [];
            if ($request->hasfile('images')) {

                foreach ($request->file('images') as $image) {
                    $name = time() . '.' . $image->getClientOriginalName();
                    $image->move('tourism_places/', $name);
                    $data[] = $name;
                }
            }
            $tourismPlace = TourismPlace::create([
                'name_ar' => $request->name_ar,
                'name_en' => $request->name_en,
                'location_ar' => $request->location_ar,
                'location_en' => $request->location_en,
                'images' => json_encode($data),
                'description' => $request->description,
                'city_id' => $request->city_id

            ]);

            if(isset($tourismPlace)){

                Session::flash('tourism_place_add',trans("tourism_place.tourism_place_success_store"));
                return redirect()->route("tourism-places.all");

            }else{

                return redirect()->back()->with(['errors' => 'يوجد خطاء ما اثناء دخول البيانات']);
            }

        }catch (\Exception $exception){

            return response()->json(['message' => $exception->getMessage(),'code' => 500]);

        }


    }


    public function country_edit($id){


        $country = Country::select("id","name")->where('id','=',$id)->first();
        if(!$country){

            abort(404);
        }

        return view('tourism-places.countries.edit', compact('country'));


    }
    public function city_edit($id){

        $city = City::with('country:id,name')->select("id","name","country_id")->where('id','=',$id)->first();

        $countries = Country::select("id","name")->get();

        if(!$city){

            abort(404);
        }

        return view('tourism-places.cities.edit', compact('city','countries'));


    }
    public function tourism_place_edit($id){

        $countries = Country::select("id","name")->get();
        $cities = City::with("country:id,name")->select("id","name","country_id")->get();

        $tourismPlace = TourismPlace::where('id','=',$id)->first();
        if(!$tourismPlace){

            abort(404);
        }

        return view('tourism-places.tourism-place.edit', compact('tourismPlace','countries','cities'));

    }

    public function country_update(Request $request,$id){

        try {

            $rules = [
                "name" => "required|string|unique:countries,name," . $id
            ];

            $message = [
                "name.required" => trans("tourism_place.country_name_required"),
                "name.string" => trans("tourism_place.country_name_string"),
                "name.unique" => trans("tourism_place.country_name_unique"),

            ];

            $country = Country::select("id","name")->where('id','=',$id)->first();
            if(!$country){

                abort(404);
            }

            $validator = Validator::make($request->all(),$rules,$message);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)
                    ->withInput();
            }


            $country->update([
                'name' => $request->name

            ]);

            Session::flash('country_update',trans("tourism_place.country_success_update"));
            return redirect()->route("tourism-places.countries");

        }catch (\Exception $exception){

            return response()->json(['message' => $exception->getMessage(),'code' => 500]);
        }

    }

    public function city_update(Request $request, $id){

        try {

            $rules = [
                "name" => "required|string|unique:cities,name," . $id,
                "country_id" => "required|exists:countries,id"
            ];

            $message = [
                "name.required" => trans("tourism_place.city_name_required"),
                "name.string" => trans("tourism_place.city_name_string"),
                "country_id.required" => trans("tourism_place.country_id_required"),
                "country_id.exists" => trans("tourism_place.country_id_exists")
            ];

            $validator = Validator::make($request->all(),$rules,$message);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $city = City::create([
                'name' => $request->name,
                'country_id' => $request->country_id

            ]);

            if(isset($city)){

                Session::flash('city_update',trans("tourism_place.city_success_update"));
                return redirect()->route("tourism-places.cities");

            }else{

                return redirect()->back()->with(['errors' => 'يوجد خطاء ما اثناء دخول البيانات']);

            }

        }catch (\Exception $exception){

            return response()->json(['message' => $exception->getMessage(),'code' => 500]);

        }


    }

    public function tourism_place_update(Request $request, $id){

        try {

            $rules = [
                "name_ar" => "required",
                "name_en" => "required",
                "location_ar" => "required",
                "location_en" => "required",
                "images" => "nullable|array|min:1|mimes:jpg,png,jpeg",
                "description" => "required",
                "city_id" => "required|exists:cities,id"
            ];

            $message = [

                "name_ar.required" => trans("tourism_place.tourism_place_name_ar_required"),
                "name_en.required" => trans("tourism_place.tourism_place_name_en_required"),
                "location_ar.required" => trans("tourism_place.tourism_place_location_ar_required"),
                "location_en.required" => trans("tourism_place.tourism_place_location_en_required"),
                "images.array" => trans("tourism_place.tourism_place_images_array_required"),
                "images.mimes" => trans("tourism_place.tourism_place_mimes_required"),
                "description.required" => trans("tourism_place.tourism_place_description_required"),
                "city_id.exists" => trans("tourism_place.tourism_place_city_id_exists_required"),
                "city_id.required" => trans("tourism_place.tourism_place_city_id_required"),

            ];


            $tourismPlace = TourismPlace::where('id','=',$id)->first();
            if(!$tourismPlace){

                abort(404);
            }

            $validator = Validator::make($request->all(),$rules,$message);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }



            $data = [];
            if ($request->hasfile('images')) {

                foreach ($request->file('images') as $image) {
                    $name = time() . '.' . $image->getClientOriginalName();
                    $image->move('tourism_places/', $name);
                    $data[] = $name;
                }

                $images = json_decode($tourismPlace, true);
                foreach ($images as $image) {
                    if(file_exists('tourism_places/' . $image)){
                        unlink('tourism_places/' . $image);
                    }else{

                        return response()->json(['data' => null, 'message' => 'يوجد خطاء ما عند حذف الصور القديمه','code' => 500]);

                    }
                }
            }
            $tourismPlace->update([
                'name_ar' => $request->name_ar,
                'name_en' => $request->name_en,
                'location_ar' => $request->location_ar,
                'location_en' => $request->location_en,
                'images' => $request->hasfile('images') != null ? json_encode($data) : $tourismPlace->images,
                'description' => $request->description,
                'city_id' => $request->city_id

            ]);

            if(isset($tourismPlace)){

                Session::flash('tourism_place_update',trans("tourism_place.tourism_place_success_update"));
                return redirect()->route("tourism-places.all");

            }else{

                return redirect()->back()->with(['errors' => 'يوجد خطاء ما اثناء دخول البيانات']);
            }

        }catch (\Exception $exception){

            return response()->json(['message' => $exception->getMessage(),'code' => 500]);

        }

    }

    public function country_delete($id){

        $country = Country::where('id','=',$id)->first();
        if(!$country){

            abort(404);
        }

        $country->delete();
        Session::flash('country_delete',trans("tourism_place.country_success_delete"));
        return redirect()->route("tourism-places.countries");


    }

    public function city_delete($id){

        $city = City::where('id','=',$id)->first();
        if(!$city){

            abort(404);
        }

        $city->delete();
        Session::flash('city_delete',trans("tourism_place.city_success_delete"));
        return redirect()->route("tourism-places.cities");

    }

    public function tourism_place_delete($id){

        $tourismPlace = TourismPlace::where('id','=',$id)->first();
        if(!$tourismPlace){

            abort(404);
        }

        $images = json_decode($tourismPlace, true);
        foreach ($images as $image) {
            if (file_exists('tourism_places/' . $image)) {

                unlink('tourism_places/' . $image);
            } else {

                return response()->json(['data' => null, 'message' => 'يوجد خطاء ما عند حذف الصور القديمه', 'code' => 500]);

            }
        }

        $tourismPlace->delete();
        Session::flash('tourism_place_delete',trans("tourism_place.tourism_place_success_delete"));
        return redirect()->route("tourism-places.all");
    }


    public function cities_by_country($id){

        $country = Country::where('id','=',$id)->first();
        if(!$country){

            abort(404);
        }
        $cities = City::with("country:id,name")->select("id","name","country_id","created_at")
            ->where('country_id','=',$id)->get();

        return view("tourism-places.countries.cities",compact("cities"));

    }
    public function tourism_places_by_city($id){

        $city = City::where('id','=',$id)->first();
        if(!$city){

            abort(404);
        }

        $tourismPlaces =  TourismPlace::with("city:id,name,country_id")
            ->select( "name_ar", "name_en", "images", "location_ar", "location_en", "description", "city_id")
            ->where('city_id','=',$id)->get();

        return view("tourism-places.cities.tourism_places",compact("tourismPlaces"));

    }

   public function all_cities_by_country($id){

        $cities = City::where("country_id", $id)->pluck("name","id");

        return $cities;
   }

}