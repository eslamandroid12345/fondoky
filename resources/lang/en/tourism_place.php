<?php

return [

    //sidebar
    "countries_sidebar" => "Countries",
    "cities_sidebar" => "Cities",
    "tourism_places_sidebar" => "Tourism places",

    //country validation
    "country_name_required" => "The country name is required",
    "country_name_string" => "The country name must be an string",
    "country_name_unique" => "Country name already exists",

    //country message success
    "country_message_success_store" => "The country added successfully",
    "country_message_success_update" => "The country name has been successfully updated",


    //city validation
    "tourism_place.city_name_required" => "Please enter a city name",
    "tourism_place.city_name_unique" => "This city already exists!",
    "tourism_place.city_name_string" => "The city name is must be an string without numbers",
    "tourism_place.country_id_required" => "The country of this city is required",
    "tourism_place.country_id_exists" => "This country not exists",


    //All message success
    "country_success_store" => "A new city has been added successfully",
    "country_success_update" => "Country name has been updated successfully",

    "city_success_store" => "A new province belonging to this city has been successfully added!",
    "city_success_update" => "The city name has been updated successfully!",

    "tourism_place_success_store" => "A new tourist place has been added",
    "tourism_place_success_update" => "The tourist place was successfully updated",

    "country_success_delete" => "The country was successfully deleted",
    "city_success_delete" => "The city was successfully deleted",
    "tourism_place_success_delete" => "The place was successfully deleted",


    //header all
    "header_countries" => "All Countries",
    "header_cities" => "All Cities",
    "header_tourism_places" => "All Tourism places",


    //Add data for all
    "country_create" => "Add a country or city",
    "city_places_create" => "Add a city",
    "tourism_places_create" => "Add a tourist place",

    //Relation data
    "cities_of_country" => "countries",
    "tourism places_of_city" => "tourist places",

    //for each data of countries
    "country_id" => "country code",
    "country_name" => "country name",
    "country_created_at" => "date added",
    "country_update" => "Update Country Name",
    "country_delete" => "delete country",



    //foreach all data of cities
    "city_id" => "City Code",
    "city_name" => "Country Name",
    "country_of_city" => "Country of City",
    "city_created_at" => "date added",
    "city_update" => "City Update",
    "city_delete" => "delete province",


    //foreach all data of tourism_places
    "tourism_places_id" => "place code",
    "tourism_places_name_ar" => "The name of the tourist place in Arabic",
    "tourism_places_name_en" => "The name of the tourist place in English",
    "tourism_places_location_ar" => "The location of the place in Arabic",
    "tourism_places_location_en" => "location of the place in English",
    "tourism_places_city" => "the name of its governorate",
    "tourism_places_update" => "place update",
    "tourism_places_delete" => "delete place",


    //store Country data
    "country_name_store" => "Country name",

    //store city data
    "city_name_store" => "City name",

    //Tourism places validation
    "tourism_place_name_ar_required" => "The name of the tourist place in Arabic is required",
    "tourism_place_name_en_required" => "The name of the tourist place in English is required",
    "tourism_place_location_ar_required" => "The location of the tourist place in Arabic is required",
    "tourism_place_location_en_required" => "The location of the tourist place in English is required",
    "tourism_place_images_required" => "Photos of the tourist place are required",
    "tourism_place_images_array_required" => "You must attach at least one photo of the tourist place",
    "tourism_place_mimes_required" => "You must upload the image as jpg,png,jpeg",
    "tourism_place_description_required" => "Tourism place description required",
    "tourism_place_city_id_exists_required" => "The name of the governorate to which the tourist place is located does not exist",
    "tourism_place_city_id_required" => "You must select the governorate for the tourist place",


    //Tourism place form create
    "name_ar" => "The name of the place in Arabic",
    "name_en" => "place name in English",
    "location_ar" => "location of the place in Arabic",
    "location_en" => "location of the place in English",
    "description" => "Write a description of the tourist place",
    "images" => "image of the place",
    "tourism_country" => "select a country",
    "tourism_city" => "the name of the governorate to which the tourist place belongs",

];