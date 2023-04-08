<?php


return [

    //sidebar
    "countries_sidebar" => "المدن",
    "cities_sidebar" => "المحافاظات",
    "tourism_places_sidebar" => "الاماكن السياحيه",

    //country validation
    "country_name_required" => "ادخل اسم المدينه او الدوله",
    "country_name_string" => "اسم المدينه او الدوله يجب ان يكون نص ولا يتضمن ارقام",
    "country_name_unique" => "اسم الدوله موجود من قبل",

    //All message success
    "country_success_store" => "تم اضافه مدينه جديده بنجاح",
    "country_success_update" => "تم تعديل اسم الدوله بنجاح",

    "city_success_store" => "تم اضافه محافظه جديده تابعه لهذه المدينه بنجاح !",
    "city_success_update" => "تم تعديل اسم المحافظه بنجاح !",

    "tourism_place_success_store" => "تم اضافه مكان سياحي جديد",
    "tourism_place_success_update" => "تم تعديل المكان السياحي بنجاح",

    "country_success_delete" => "تم حذف الدوله بنجاح",
    "city_success_delete" => "تم حذف المحافظه بنجاح",
    "tourism_place_success_delete" => "تم حذف المكان السياحي بنجاح",




    //city validation
   "city_name_required" => "يرجي ادخال اسم المدينه",
    "city_name_unique" => "هذه المدينه موجوده من قبل!",
    "city_name_string" => "اسم المدينه يجب ان يتضمن نص وليس ارقام",
    "country_id_required" => "ادخل المدينه التابع لها هذه المحافظه",
    "country_id_exists" => "هذه المدينه غير موجوده!",



    //header all
    "header_countries" => "جميع الدول",
    "header_cities" => "جميع المحافظات",
    "header_tourism_places" => "جميع الاماكن السياحيه",


    //Add data for all
    "country_create" => "اضافه دوله او مدينه",
    "city_places_create" => "اضافه محافظه",
    "tourism_places_create" => "اضافه مكان سياحي",


    //Relation data
    "cities_of_country" => "المحافاظات",
    "tourism_places_of_city" => "الاماكن السياحيه",


    //foreach all data of countries
    "country_id" => "رمز الدوله",
    "country_name" => "اسم الدوله",
    "country_created_at" => "تاريخ الاضافه",
    "country_update" => "تعديل اسم الدوله",
    "country_delete" => "حذف الدوله",



    //foreach all data of cities
    "city_id" => "رمز المحافظه",
    "city_name" => "اسم المحافظه",
    "country_of_city" => "اسم الدوله التابعه لها",
    "city_created_at" => "تاريخ الاضافه",
    "city_update" => "تعديل المحافظه",
    "city_delete" => "حذف المحافظه",


    //foreach all data of tourism_places
    "tourism_places_id" => "رمز المكان",
    "tourism_places_name_ar" => "اسم المكان السياحي باللغه العربيه",
    "tourism_places_name_en" => "اسم المكان السياحي باللغه الانجليزيه",
    "tourism_places_location_ar" => "موقع المكان باللغه العربيه",
    "tourism_places_location_en" => "موقع المكان باللغه الانجليزيه",
    "tourism_places_city" => "اسم المحافظه التابعه لها",
    "tourism_places_update" => "تعديل المكان",
    "tourism_places_delete" => "حذف المكان",


    //store Country data
    "country_name_store" => "اسم الدوله",

    //store city data
    "city_name_store" => "اسم المحافظه",
    
    
    //Tourism places validation
    "tourism_place_name_ar_required" => "اسم المكان السياحي باللغه العربيه مطلوب",
    "tourism_place_name_en_required" => "اسم المكان السياحي باللغه الانجليزيه مطلوب",
   "tourism_place_location_ar_required" => "موقع المكان السياحي باللغه العربيه مطلوب",
    "tourism_place_location_en_required" => "موقع المكان السياحي باللغه الانجليزيه مطلوب",
   "tourism_place_images_required" => "صور المكان السياحي مطلوب",
   "tourism_place_images_array_required" => "يجب ارفاق صوره واحده علي الاقل للمكان السياحي",
   "tourism_place_mimes_required" => "يجب عليك رفع الصوره من نوع jpg,png,jpeg",
   "tourism_place_description_required" => "وصف المكان السياحي مطلوب",
   "tourism_place_city_id_exists_required" => "اسم المحافظه التابع لها المكان السياحي غير موجوده",
   "tourism_place_city_id_required" => "يجب عليك اختيار المحافظه للمكان السياحي",


    //Tourism place form create
    "name_ar" => "اسم المكان باللغه العربيه",
    "name_en" => "اسم المكان باللغه الانجليزيه",
    "location_ar" => "موقع المكان باللغه العربيه",
    "location_en" => "موقع المكان باللغه الانجليزيه",
    "description" => "اكتب وصف للمكان السياحي",
    "images" => "صوره المكان",
    "tourism_country" => "اختر الدوله",
    "tourism_city" => "اسم المحافظه التابع لها المكان السياحي",


];