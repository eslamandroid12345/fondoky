<?php

namespace App\Interfaces\Web;

use Illuminate\Http\Request;

interface TourismPlaceRepositoryInterface{


    public function countries();
    public function cities();
    public function tourism_places_all();
    public function tourism_places_details($id);

    public function country_create();
    public function city_create();
    public function tourism_place_create();

    public function country_edit($id);
    public function city_edit($id);
    public function tourism_place_edit($id);


    public function country_store(Request $request);
    public function city_store(Request $request);
    public function tourism_place_store(Request $request);

    public function country_update(Request $request,$id);
    public function city_update(Request $request,$id);

    public function tourism_place_update(Request $request,$id);
    public function country_delete($id);
    public function city_delete($id);
    public function tourism_place_delete($id);

    public function cities_by_country($id);
    public function tourism_places_by_city($id);

    public function all_cities_by_country($id);


}



