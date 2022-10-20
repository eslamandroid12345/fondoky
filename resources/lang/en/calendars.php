<?php
return [

    //start validation
    "room_id" => "room type field is required",
    "room_number" => "room number field is required",
    "room_integer" => "room number must be an number",
    "check_in" => "room availability start date",
    "check_out" => "room availability end date",
    "room_price" => "room price field is required",
    "room_price_regex" => "The room rate should contain numbers, not letters",


    //start data in view
    "room_type" => "room type",
    "room_number_add" => "room number",
    "check_in_add" => "room availability start date",
    "check_out_add" => "room availability end date",
    "room_price_add" => "room price",
    "message" => "The room calendar has been added successfully",

     "save" => "save",
    "delete" => "calendars deleted successfully",
    "message_update" => "calendar updated successfully",

    "before" => "check in must be before check out",
    "after" => "check out must be before check in",

];
