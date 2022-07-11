@extends('layouts_login.layout')
@section('title','تسجيل فندق جديد')
@section('styles')
    <style>
      .ftco-section{


          height: auto;
          margin-top: -50px;
      }

        .img{

            background: none;
            width: 0%;
        }

      .login-wrap {
          width: 100%;
      }

      @media (max-width: 767.98px){

          .wrap .img {
              height: 0px;
          }
          }


    </style>
@endsection
@section('content')

    <div class="login-wrap p-4 p-md-5 mt-5">

        <div style="display: none" id="alert" class="alert alert-primary"></div>
        <div class="d-flex">
            <div class="w-100">
                <h3 class="mb-4">{{__('room_add.hot')}}</h3>

            </div>

        </div>
        <form  id="upload-image-form" enctype="multipart/form-data" method="post" class="signin-form">

{{--            @csrf--}}
            <meta name="csrf-token" content="{{ csrf_token() }}" />


            <div class="form-group mb-3">
                <label class="label" for="name">{{ __('register.country') }}</label>
                <input type="text" id="country" name="country" autocomplete="off" class="form-control" value="{{old('country')}}" placeholder="{{ __('register.country') }}">
                <span id="country_error" class="text-danger"></span>
            </div>


            <div class="form-group mb-3">
                <label class="label" for="name">{{ __('register.country_en') }}</label>
                <input type="text" id="country_en" name="country_en" autocomplete="off" class="form-control" value="{{old('country_en')}}" placeholder="{{ __('register.country') }}">
                <span id="country_en_error" class="text-danger"></span>
            </div>



            <div class="form-group mb-3">
                <label class="label" for="name">{{ __('register.manger') }}</label>
                <input type="text" id="manger" name="manger" autocomplete="off" class="form-control" value="{{old('manger')}}" placeholder="{{ __('register.manger') }}">
                <span id="manger_error" class="text-danger"></span>

            </div>



            <div class="form-group mb-3">
                <label class="label" for="name">{{ __('register.name_ar') }}</label>
                <input type="text" id="name_ar" name="name_ar" autocomplete="off" class="form-control" value="{{old('name_ar')}}" placeholder="{{ __('register.name_ar') }}">
                <span id="name_ar_error" class="text-danger"></span>
            </div>

            <div class="form-group mb-3">
                <label class="label" for="name">{{ __('register.name_en') }}</label>
                <input type="text" id="name_en" name="name_en" autocomplete="off" class="form-control" value="{{old('name_en')}}" placeholder="{{ __('register.name_en') }}">
                <span id="name_en_error" class="text-danger"></span>
            </div>





            <div class="form-group mb-3">
                <label class="label" for="name">{{__('register.email')}}</label>
                <input type="email" id="email" name="email" autocomplete="off" class="form-control" value="{{old('email')}}" placeholder="{{__('register.email')}}" >
                <span id="email_error" class="text-danger"></span>
            </div>

            <div class="form-group mb-3">
                <label class="label" for="password">{{__('register.password')}}</label>
                <input type="password" id="password" autocomplete="off" name="password" class="form-control" placeholder="{{__('register.password')}}" >
                <span id="password_error" class="text-danger"></span>
            </div>

            <div class="form-group mb-3">
                <label class="label" for="name">{{ __('register.location_ar') }}</label>
                <input id="pac-input"  type="text" name="location_ar" class="form-control" value="{{old('location_ar')}}" placeholder="{{ __('register.location_ar') }}">

                <div id="map" style="height: 300px;width: 100%"></div>
                <span id="location_ar_error" class="text-danger"></span>
            </div>


            <div class="form-group mb-3">
                <label class="label" for="name">{{ __('register.location_en') }}</label>
                <input type="text" id="location_en" name="location_en" class="form-control" value="{{old('location_en')}}" placeholder="{{ __('register.location_en') }}">

                <span id="location_en_error" class="text-danger"></span>
            </div>


            <div class="form-group mb-3">
                @php
                    $currencies_ar = ["ريال السعودي ","دولار الامريكي","يورو","درهم الاماراتي","دينار البحريني","جنيه المصري","جنيه البريطاني","دينار الكويتي","ريال العماني","ريال القطري"];

                @endphp

                <select class="form-control" name="pound" class="form-control form-control-lg input-lg">

                    @foreach($currencies_ar as $currency)
                        <option value="{{$currency}}">{{$currency}}</option>
                    @endforeach
                </select>


                <span id="pound_error" class="text-danger"></span>
            </div>


            <div class="form-group mb-3">
                @php

                    $currencies_en = ["SAR","USD","EUR","AED","BHD","EGP","GPP","KWD","OMR","QAR"];


                @endphp

                <select class="form-control" name="currency_en" class="form-control form-control-lg input-lg">

                    @foreach($currencies_en as $currency_en)
                        <option value="{{$currency_en}}">{{$currency_en}}</option>
                    @endforeach
                </select>


                <span id="currency_en_error" class="text-danger"></span>
            </div>




            <div class="form-group mb-3">
                <label class="label" for="name">{{ __('register.description') }}</label>

                <textarea id="description" autocomplete="off" class="form-control" name="description"></textarea>
                <span id="description_error" class="text-danger"></span>
            </div>



            <div class="form-group mb-3">
                <label class="label" for="name">{{ __('register.phone_hotel') }}</label>
                <input type="number" id="phone_hotel" autocomplete="off" name="phone_hotel" class="form-control" value="{{old('phone_hotel')}}" placeholder="{{ __('register.phone_hotel') }}">
                <span id="phone_hotel_error" class="text-danger"></span>
            </div>



            <div class="form-group mb-3">
                <label class="label" for="name">{{ __('register.images') }}</label>
                <input type="file" id="hotel_photos" multiple name="hotel_photos[]" class="form-control">
                <span id="hotel_photos_error" class="text-danger"></span>

            </div>


            <div class="form-group">
                <button type="submit" class="form-control btn btn-primary rounded submit px-3"> {{ __('register.button') }}</button>
            </div>

        </form>
    </div>

@endsection
@section('scripts')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script>


        $('#upload-image-form').submit(function(event) {

            event.preventDefault();
            $('#country_error').text('');
            $('#country_en_error').text('');
            $('#manger_error').text('');
            $('#name_ar_error').text('');
            $('#name_en_error').text('');
            $('#email_error').text('');
            $('#password_error').text('');
            $('#location_ar_error').text('');
            $('#location_en_error').text('');
            $('#pound_error').text('');
            $('#currency_en_error').text('');
            $('#description_error').text('');
            $('#phone_hotel_error').text('');
            $('#hotel_photos_error').text('');


            let formData = new FormData(this);


            $.ajax({

                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },

                type:'POST',
                enctype : 'multipart/form-data',
                url : "{{route("hotels.register")}}",
                data: formData,
                contentType: false,
                processData: false,
                cache: false,


                success: function (data) {

                    if(data.status === true){

                        $('#alert').show();
                        $('#alert').append(data.message);
                        $("#alert").delay(3000).fadeOut();
                        $('#country').val('');
                        $('#country_en').val('');
                        $('#manger').val('');
                        $('#name_ar').val('');
                        $('#name_en').val('');
                        $('#email').val('');
                        $('#password').val('');
                        $('#pac-input').val('');
                        $('#location_en').val('');
                        $('#description').val('');
                        $('#phone_hotel').val('');
                        $('#hotel_photos').val('');
                        $('html, body').animate({ scrollTop: 0 }, 0);


                    }
                },

                error: function (error) {

                    var response = $.parseJSON(error.responseText);
                    $.each(response.errors, function (key, val) {

                        $("#" + key + "_error").text(val[0]);

                    });
                }

            });

        });

    </script>

@endsection


