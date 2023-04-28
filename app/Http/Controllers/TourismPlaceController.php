<?php

namespace App\Http\Controllers;

use App\Interfaces\Web\TourismPlaceRepositoryInterface;
use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;

class TourismPlaceController extends Controller{

    public $tourismPlaceRepositoryInterface;

    public function __construct(TourismPlaceRepositoryInterface $tourismPlaceRepositoryInterface){

        $this->tourismPlaceRepositoryInterface = $tourismPlaceRepositoryInterface;

    }
    public function countries(){

        return $this->tourismPlaceRepositoryInterface->countries();
    }

    public function cities(){

        return $this->tourismPlaceRepositoryInterface->cities();
    }

    public function tourism_places_all(){

        return $this->tourismPlaceRepositoryInterface->tourism_places_all();
    }

    public function tourism_places_details($id){

        return $this->tourismPlaceRepositoryInterface->tourism_places_details($id);
    }

    public function tourism_places_create(){

        return $this->tourismPlaceRepositoryInterface->tourism_place_create();


    }
    public function country_create(){

        return $this->tourismPlaceRepositoryInterface->country_create();

    }
    public function city_create(){

        return $this->tourismPlaceRepositoryInterface->city_create();

    }
    public function tourism_place_create(){

        return $this->tourismPlaceRepositoryInterface->tourism_place_create();

    }

    public function country_store(Request $request){

        return $this->tourismPlaceRepositoryInterface->country_store($request);
    }

    public function city_store(Request $request){

        return $this->tourismPlaceRepositoryInterface->city_store($request);

    }

    public function tourism_place_store(Request $request){

        return $this->tourismPlaceRepositoryInterface->tourism_place_store($request);
    }

    public function country_edit($id){

        return $this->tourismPlaceRepositoryInterface->country_edit($id);

    }
    public function city_edit($id){

        return $this->tourismPlaceRepositoryInterface->city_edit($id);


    }

    public function tourism_places_edit($id){

        return $this->tourismPlaceRepositoryInterface->tourism_place_edit($id);
    }
    public function tourism_place_edit($id){

        return $this->tourismPlaceRepositoryInterface->tourism_place_edit($id);

    }

    public function country_update(Request $request, $id){

        return $this->tourismPlaceRepositoryInterface->country_update($request,$id);
    }

    public function city_update(Request $request, $id){

        return $this->tourismPlaceRepositoryInterface->city_update($request,$id);
    }

    public function tourism_place_update(Request $request, $id){

        return $this->tourismPlaceRepositoryInterface->tourism_place_update($request,$id);
    }

    public function country_delete($id){

        return $this->tourismPlaceRepositoryInterface->country_delete($id);

    }

    public function city_delete($id){

        return $this->tourismPlaceRepositoryInterface->city_delete($id);
    }

    public function tourism_place_delete($id){

        return $this->tourismPlaceRepositoryInterface->tourism_place_delete($id);

    }


    public function cities_by_country($id){

        return $this->tourismPlaceRepositoryInterface->cities_by_country($id);


    }
    public function tourism_places_by_city($id){

        return $this->tourismPlaceRepositoryInterface->tourism_places_by_city($id);

    }

    public function all_cities_by_country($id){

        return $this->tourismPlaceRepositoryInterface->all_cities_by_country($id);

    }
}
