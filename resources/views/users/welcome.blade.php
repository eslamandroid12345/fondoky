@extends('client_app.layout')
@section('style')
    <style>

        /* img/james-wheeler-0vysUcbfYx4-unsplash.jpg */
        /* img/as_2.webp */
        .header1{

            background-image: url({{asset('img/james-wheeler-0vysUcbfYx4-unsplash.jpg')}});
            height: 70vh;
            background-size: 100% 100%;
            background-repeat: no-repeat;
            margin-top: 74px;
        }

    </style>

    @if(LaravelLocalization::setLocale() == 'en')
        <style>

            .second{

                direction: ltr;
            }

            .header1{

                direction: ltr;
            }
            .section1{

                direction: ltr;

            }

            .section1 ul li img {
                float: left;
                padding-right: 10px;
            }

            .section1 ul li img {
                padding-left: 0px;
                width: 30px;
            }

            .section1 ul{

                padding-left: 0px;
            }

            .section2 h2,h4 {

                direction: ltr;
            }

            .navbar,.hotel{

                direction: ltr;

            }
            .header1-alpha{
                direction: ltr;
            }

            #map,#map2 {
                width: 100%;
                height: 200px;
            }
        </style>

    @endif

@endsection
@section('content')





    <video src="{{asset('video/tirana-optimised.mp4')}}" controls autoplay id="videoId" class="btn noHover" loop style="width: 100%;
height: 100%;padding: 0px ">


    </video>

    <!--Start Header-->

    <div class="header1-alpha" style="position: absolute;margin-top: -300px;width:100%;color: #fff">
        <div class="container">
            <div class="row header2">

                <div class="col-lg-12">

                    <h1>{{__('welcome.h')}}</h1>
                    <p>{{__('welcome.p')}}</p>



                </div>

            </div>
        </div>
    </div>




    <!--End Header-->

    <!--Start Second-->

    <div class="second">
        <div class="container">
            <div class="row">

                <form action="{{url('/')}}" class="form1" method="GET" autocomplete="off">

                        <div class="col-lg-4 col-md-4 col-12">
                            <input style="width: 100%" id="search3" type="text" name="location_{{lang()}}" placeholder="{{__('welcome.country')}}" value="{{request()->query('location_ar')}}">

                            <div style="display: none" id="map3"></div>

                        </div>

                    <div class="col-lg-2 col-md-2 col-12">
                        <input  type="text" placeholder="{{\Carbon\Carbon::now()->format('Y-m-d')}}" class="textbox-n" id="start" name="date_start" value="{{request()->query('date_start')}}" readonly="readonly" />

                    </div>



                    <div class="col-lg-2 col-md-2 col-12">

                        <input  type="text" placeholder="{{\Carbon\Carbon::now()->addDays(1)->format('Y-m-d')}}" class="textbox-n" id="end" name="date_expire" value="{{request()->query('date_expire')}}" readonly="readonly" />

                    </div>


                    <div class="col-lg-2 col-md-2 col-12 child">
                        <input type="number" placeholder="{{__('welcome.adults_max')}}" name="adults_max" value="{{request()->query('adults_max')}}">
                        <input type="number"  name="child_max" value="{{request()->query('child_max')}}" placeholder="{{__('welcome.child_max')}}">
                    </div>

                    <div class="col-lg-2 col-md-2 col-12 sub">
                        <input type="submit" value="{{__('welcome.search')}}">
                    </div>


                </form>


            </div>
        </div>
    </div>

    <!--Start section1-->
    <div class="section1">
        <div class="container">
            <section class="_1o0x7p">
                <h2>{{__('welcome.h2')}}</h2>
                <ul class="row">
                    <li class="col-lg-6 col-12">
                        <img src="{{asset('img/check.png')}}" alt="" srcset="">
                        <div>
                            <h3>{{__('welcome.h3_1')}}</h3>
                            <span>{{__('welcome.span_1')}}</span>
                        </div>

                    </li>

                    <li class="col-lg-6 col-12">
                        <img src="{{asset('img/distance.png')}}" alt="" srcset="">
                        <div>
                            <h3>{{__('welcome.h3_2')}}</h3>
                            <span>{{__('welcome.span_2')}}</span>
                        </div>
                    </li>

                    <li class="col-lg-6 col-12">
                        <img src="{{asset('img/hand-sanitizer.png')}}" alt="" srcset="">
                        <div>
                            <h3>{{__('welcome.h3_3')}}</h3>
                            <span>{{__('welcome.span_3')}}</span>
                        </div>
                    </li>

                    <li class="col-lg-6 col-12">
                        <img src="{{asset('img/washing-hands.png')}}" alt="" srcset="">
                        <div>
                            <h3>{{__('welcome.h3_4')}}</h3>
                            <span>{{__('welcome.span_4')}}</span>
                        </div>
                    </li>


                </ul>
            </section>



        </div>
    </div>

    <!--End section1-->



    <!--Start Section2-->
    <div class="section2">
        <div class="container">

            <h2>{{__('welcome.best_hotels')}}</h2>
            <h4>{{__('welcome.search_hotels')}} </h4>

            <div class="row row-cols-1 row-cols-md-3 g-4 hotel">

                @if(!empty($rooms))
                    @forelse($rooms as $room)


                            <?php
                            $price = 0;

                            for ($i = 0 ; $i < $room->calendars->count(); $i++){

                                $price += ($room->calendars[$i]->room_price);
                            }

                            ?>

                        <a href="{{route('room.reservation',[$room->id,'country' => lang() == 'ar' ? request()->query('location_ar') : request()->query('location_en'), 'date_start' => request()->query('date_start'), 'date_expire' => request()->query('date_expire'), 'adults_max' => request()->query('adults_max'),'child_max' => request()->query('child_max')])}}">

                            <div class="col">
                                <div class="card h-100">

                                    @if(!empty($room))
                                        {{--                            // room photos--}}
                                        @foreach(json_decode($room->images) as $image)
                                            <img src="{{URL::to('/rooms/'.$image)}}" class="card-img-top" alt="...">
                                        @endforeach
                                    @endif

                                    <div class="card-body">

                                        <div class="row" style="align-items: flex-end;height: 100%">

                                            <div>

                                                @php
                                                    $begin = new DateTime(request()->query('date_start'));
                                                    $end   = new DateTime(request()->query('date_expire'));


                                                    $different = $begin->diff($end);
                                                    $days = $different->format('%a');//now do whatever you like with $days

                                                @endphp
                                                <h3 class="card-title">{{ lang() == 'ar' ? $room->hotel->location_ar : $room->hotel->location_en }} - {{lang() == 'ar' ? $room->hotel->name_ar : $room->hotel->name_en}}</h3>.
                                                <br>

                                                <h6>{{$room->room_type}} </h6>
                                                <span>{{$room->adults_max}} {{__('welcome.adult')}} / {{$room->child_max }} {{__('welcome.child')}}</span><br><br>
                                                <span>{{__('welcome.stay')}}  {{$days}} {{__('welcome.night')}}  </span><br>
                                                <span>{{__('welcome.total')}}  {{number_format($price,2)}}  {{ lang() == 'ar' ? $room->hotel->currency_ar :  $room->hotel->currency_en}} </span>

                                            </div>

                                        </div>

                                    </div>

                                </div>
                            </div>
                        </a>

                    @empty
                       <div>
                           <p>{{__('welcome.no_search')}}</p>
                       </div>
                    @endforelse
                @endif


                {{--start pagination of rooms and hotels--}}

            </div>


        </div>


    </div>


    <!--End Section2-->

@endsection


@section('scripts')
    <script>
        function initMap() {
            var map = new google.maps.Map(document.getElementById('map3'), {
                center: {lat: 22.3038945, lng: 70.80215989999999},
                zoom: 13
            });


            var input = document.getElementById('search3');

            map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

            var autocomplete = new google.maps.places.Autocomplete(input);

            autocomplete.bindTo('bounds', map);

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