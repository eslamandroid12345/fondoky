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

        <div class="d-flex">
            <div class="w-100">
                <h3 class="mb-4">{{__('room_add.hot')}}</h3>

            </div>

        </div>
        <form  action="{{ route('hotels.register') }}" enctype="multipart/form-data" method="post" class="signin-form">

            @csrf

            <div class="form-group mb-3">
                <label class="label" for="name">{{ __('register.country') }}</label>
                <input type="text" name="country" autocomplete="off" class="form-control" value="{{old('country')}}" placeholder="{{ __('register.country') }}">
                @error('country')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>


            <div class="form-group mb-3">
                <label class="label" for="name">{{ __('register.country_en') }}</label>
                <input type="text" name="country_en" autocomplete="off" class="form-control" value="{{old('country_en')}}" placeholder="{{ __('register.country') }}">
                @error('country_en')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>



            <div class="form-group mb-3">
                <label class="label" for="name">{{ __('register.manger') }}</label>
                <input type="text" name="manger" autocomplete="off" class="form-control" value="{{old('manger')}}" placeholder="{{ __('register.manger') }}">
                @error('manger')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>



            <div class="form-group mb-3">
                <label class="label" for="name">{{ __('register.name_ar') }}</label>
                <input type="text" name="name_ar" autocomplete="off" class="form-control" value="{{old('name_ar')}}" placeholder="{{ __('register.name_ar') }}">
                @error('name_ar')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label class="label" for="name">{{ __('register.name_en') }}</label>
                <input type="text" name="name_en" autocomplete="off" class="form-control" value="{{old('name_en')}}" placeholder="{{ __('register.name_en') }}">
                @error('name_en')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>





            <div class="form-group mb-3">
                <label class="label" for="name">{{__('register.email')}}</label>
                <input type="email" name="email" autocomplete="off" class="form-control" value="{{old('email')}}" placeholder="{{__('register.email')}}" >
                @error('email')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label class="label" for="password">{{__('register.password')}}</label>
                <input type="password" autocomplete="off" name="password" class="form-control" placeholder="{{__('register.password')}}" >
                @error('password')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label class="label" for="name">{{ __('register.location_ar') }}</label>
                <input id="pac-input" type="text" name="location_ar" class="form-control" value="{{old('location_ar')}}" placeholder="{{ __('register.location_ar') }}">

                <div id="map" style="height: 300px;width: 100%"></div>
                @error('location_ar')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>


            <div class="form-group mb-3">
                <label class="label" for="name">{{ __('register.location_en') }}</label>
                <input type="text" name="location_en" class="form-control" value="{{old('location_en')}}" placeholder="{{ __('register.location_en') }}">

                @error('location_en')
                <span class="text-danger">{{$message}}</span>
                @enderror
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


                @error('pound')
                <span class="text-danger">{{$message}}</span>
                @enderror
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


                @error('currency_en')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>




            <div class="form-group mb-3">
                <label class="label" for="name">{{ __('register.description') }}</label>

                <textarea autocomplete="off" class="form-control" name="description"></textarea>
                @error('description')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>



            <div class="form-group mb-3">
                <label class="label" for="name">{{ __('register.phone_hotel') }}</label>
                <input type="number" autocomplete="off" name="phone_hotel" class="form-control" value="{{old('phone_hotel')}}" placeholder="{{ __('register.phone_hotel') }}">
                @error('phone_hotel')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>



            <div class="form-group mb-3">
                <label class="label" for="name">{{ __('register.images') }}</label>
                <input type="file" multiple name="hotel_photos[]" class="form-control">
                @error('hotel_photos')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>


            <div class="form-group">
                <button type="submit" class="form-control btn btn-primary rounded submit px-3"> {{ __('register.button') }}</button>
            </div>

        </form>
    </div>

@endsection


