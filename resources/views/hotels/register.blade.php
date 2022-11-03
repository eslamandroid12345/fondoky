@extends('layouts_login.layout')
@section('title','تسجيل فندق جديد')
@section('styles')
    <style>

        @media (max-width: 767.98px){
            .wrap .img {
                height: 0px;
            }
           }
          #map,#map2 {
              width: 100%;
              height: 200px;
          }
        .mapControls {
            margin-top: 10px;
            border: 1px solid transparent;
            border-radius: 2px 0 0 2px;
            box-sizing: border-box;
            -moz-box-sizing: border-box;
            height: 32px;
            outline: none;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        }
        /*#searchMapInput,#searchMapInput2 {*/
        /*    background-color: #fff;*/
        /*    font-family: Roboto;*/
        /*    font-size: 15px;*/
        /*    font-weight: 300;*/
        /*    margin-left: 12px;*/
        /*    padding: 0 11px 0 13px;*/
        /*    text-overflow: ellipsis;*/
        /*    width: 50%;*/
        /*}*/
        /*#searchMapInput:focus {*/
        /*    border-color: #4d90fe;*/
        /*} #searchMapInput2:focus {*/
        /*    border-color: #4d90fe;*/
        /*}*/

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
    </style>



@endsection
@section('content')

    <div class="login-wrap p-4 p-md-5 mt-5">

        @if (session()->has('hotel'))
            <div class="alert alert-danger">
                {{session()->get('hotel')}}
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <div class="d-flex">
            <div class="w-100">
                <h3 class="mb-4">{{__('room_add.hot')}}</h3>

            </div>

        </div>
        <form  action="{{ route('hotels.register') }}" enctype="multipart/form-data" method="post" class="signin-form" autocomplete="off">

            @csrf

            <div class="form-group mb-3">
                <label  for="gender">{{ __('register.manger') }} : <span class="text-danger">*</span></label>
                <input type="text" name="manger" autocomplete="off" class="form-control" value="{{old('manger')}}" placeholder="{{ __('register.manger') }}">

            </div>



            <div class="form-group mb-3">
                <label  for="gender">{{ __('register.name_ar') }} : <span class="text-danger">*</span></label>
                <input type="text" name="name_ar" autocomplete="off" class="form-control" value="{{old('name_ar')}}" placeholder="{{ __('register.name_ar') }}">

            </div>

            <div class="form-group mb-3">
                <label for="gender">{{ __('register.name_en') }} : <span class="text-danger">*</span></label>
                <input type="text" name="name_en" autocomplete="off" class="form-control" value="{{old('name_en')}}" placeholder="{{ __('register.name_en') }}">

            </div>


            <div class="form-group mb-3">
                <label for="gender">{{__('register.email')}} : <span class="text-danger">*</span></label>
                <input type="email" name="email" autocomplete="off" class="form-control" value="{{old('email')}}" placeholder="{{__('register.email')}}" >

            </div>

            <div class="form-group mb-3">
                <label for="gender">{{__('register.password')}} : <span class="text-danger">*</span></label>
                <input type="password" autocomplete="off" name="password" class="form-control" placeholder="{{__('register.password')}}" >

            </div>

            <div class="form-group mb-3">
                <label  for="gender">{{ __('register.location_ar') }} : <span class="text-danger">*</span></label>
                <input id="searchMapInput" type="text" name="location_ar" class="form-control"  value="{{old('location_ar')}}" placeholder="{{ __('register.location_ar') }}">

                <div style="display: none" id="map"></div>

            </div>


            <div class="form-group mb-3">
                <label for="gender">{{ __('register.location_en') }} : <span class="text-danger">*</span></label>
                <input id="searchMapInput2" type="text" name="location_en" class="form-control" value="{{old('location_en')}}" placeholder="{{ __('register.location_en') }}">
                <div style="display: none" id="map2"></div>

            </div>


            <div class="form-group mb-3">
                @php
                    $currencies_ar = ["ريال السعودي ","دولار الامريكي","يورو","درهم الاماراتي","دينار البحريني","جنيه المصري","جنيه البريطاني","دينار الكويتي","ريال العماني","ريال القطري"];

                @endphp
                <select class="custom-select mr-sm-2" name="currency_ar">
                    <option selected disabled>{{ __('register.pound') }}...</option>
                    @foreach($currencies_ar as $currency)
                        <option value="{{$currency}}">{{$currency}}</option>

                    @endforeach
                </select>
                @php
                    $currencies_ar = ["ريال السعودي ","دولار الامريكي","يورو","درهم الاماراتي","دينار البحريني","جنيه المصري","جنيه البريطاني","دينار الكويتي","ريال العماني","ريال القطري"];
                @endphp

            </div>


            <div class="form-group mb-3">
                @php
                    $currencies_en = ["SAR","USD","EUR","AED","BHD","EGP","GPP","KWD","OMR","QAR"];

                @endphp
                <select class="custom-select mr-sm-2" name="currency_en">
                    <option selected disabled>{{ __('register.currency_en') }}...</option>
                    @foreach($currencies_en as  $currency_en)
                        <option value="{{$currency_en}}"}}>{{$currency_en}}</option>

                    @endforeach
                </select>

            </div>



            <div class="form-group mb-3">
                <label for="gender">{{ __('register.description') }} : <span class="text-danger">*</span></label>

                <textarea autocomplete="off" class="form-control" name="description"></textarea>

            </div>



            <div class="form-group mb-3">
                <label  for="gender">{{ __('register.phone_hotel') }} : <span class="text-danger">*</span></label>
                <input type="number" autocomplete="off" name="phone_hotel" class="form-control" value="{{old('phone_hotel')}}" placeholder="{{ __('register.phone_hotel') }}">

            </div>



            <div class="form-group mb-3">
                <label for="academic_year">{{__('hotels.images')}} : <span class="text-danger">*</span></label>
                <input type="file" name="hotel_photos[]" multiple />

            </div>


            <div class="form-group">
                <button type="submit" class="form-control btn btn-primary rounded submit px-3 submitted"> {{ __('register.button') }}</button>
            </div>

        </form>
    </div>

@endsection
@section('scripts')

        <script>
            $('form').submit(function (event) {
                if ($(this).hasClass('submitted')) {
                    event.preventDefault();
                }
                else {
                    $(this).find(':submit').html('<i class="fa fa-spinner fa-spin"></i>');
                    $(this).addClass('submitted');
                }
            });
        </script>
    <script>
        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: 22.3038945, lng: 70.80215989999999},
                zoom: 13
            });

            var map2 = new google.maps.Map(document.getElementById('map2'), {
                center: {lat: 22.3038945, lng: 70.80215989999999},
                zoom: 13
            });//map2


            var input = document.getElementById('searchMapInput');
            var input2 = document.getElementById('searchMapInput2');//map2

            map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
            map2.controls[google.maps.ControlPosition.TOP_LEFT].push(input2);

            var autocomplete = new google.maps.places.Autocomplete(input);
            var autocomplete2 = new google.maps.places.Autocomplete(input2);//map2

            autocomplete.bindTo('bounds', map);
            autocomplete2.bindTo('bounds', map2);//map2

            var infowindow = new google.maps.InfoWindow();
            var marker = new google.maps.Marker({
                map: map,
                anchorPoint: new google.maps.Point(0, -29)
            });

            autocomplete.addListener('place_changed', function() {
                infowindow.close();
                marker.setVisible(false);
                var place = autocomplete.getPlace();

                /* If the place has a geometry, then present it on a map. */
                if (place.geometry.viewport) {
                    map.fitBounds(place.geometry.viewport);
                } else {
                    map.setCenter(place.geometry.location);
                    map.setZoom(17);
                }
                marker.setIcon(({
                    url: place.icon,
                    size: new google.maps.Size(71, 71),
                    origin: new google.maps.Point(0, 0),
                    anchor: new google.maps.Point(17, 34),
                    scaledSize: new google.maps.Size(35, 35)
                }));
                marker.setPosition(place.geometry.location);
                marker.setVisible(true);

                var address = '';
                if (place.address_components) {
                    address = [
                        (place.address_components[0] && place.address_components[0].short_name || ''),
                        (place.address_components[1] && place.address_components[1].short_name || ''),
                        (place.address_components[2] && place.address_components[2].short_name || '')
                    ].join(' ');
                }

                infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
                infowindow.open(map, marker);

                /* Location details */
                document.getElementById('location-snap').innerHTML = place.formatted_address;
                document.getElementById('lat-span').innerHTML = place.geometry.location.lat();
                document.getElementById('lon-span').innerHTML = place.geometry.location.lng();
            });
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAK34ZyoH4758BkVP05-GxKP0dSmBi4yTo&libraries=places&callback=initMap" async defer></script>

@endsection

