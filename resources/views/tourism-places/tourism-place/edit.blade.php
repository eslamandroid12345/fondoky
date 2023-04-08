@extends('layouts_admin.master')
@section('css')
    @section('title')

       تعديل المكان السياحي
    @endsection
@endsection

@section('PageText')
    {{__('tourism_place.tourism_places_create')}}
@endsection
@section('page-header')
    <!-- breadcrumb -->
    @section('PageTitle')
        {{__('tourism_place.tourism_places_create')}}
    @endsection
    <!-- breadcrumb -->
@endsection


@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    @if (session()->has('tourism_place_add'))
                        <div class="alert alert-danger">
                            {{session()->get('tourism_place_add')}}
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


                    <form class="form" action="{{route('tourism-places.update',$tourismPlace->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <h6 style="font-family: 'Cairo', sans-serif;color: blue"> {{__('tourism_place.tourism_places_create')}}</h6><br>
                        <div class="row">

                            {{--                            <div class="col-md-12">--}}
                            {{--                                <div class="form-group">--}}
                            {{--                                    @php--}}

                            {{--                                        $room_types = ["Single Room","Double Room","Twin Room","Twin/Double","Trip Room","Quadruble Room","Family Room","Suite Room","Studio Room","Apartment Room","Dormitory Room","Bed in Dormitory Room","Bungalow Room","Chalet Room","Villa Room","Holiday Home Room","Mobile Home Room","Tent Room",];--}}

                            {{--                                    @endphp--}}

                            {{--                                    <label for="gender">{{__('room_add.room_type')}} <span class="text-danger">*</span></label>--}}
                            {{--                                    <select class="custom-select mr-sm-2" name="room_type">--}}
                            {{--                                        <option selected disabled>{{__('room_add.room_type')}}...</option>--}}
                            {{--                                        @foreach($room_types as $room_type)--}}

                            {{--                                            <option value="{{$room_type}}">{{$room_type}}</option>--}}
                            {{--                                        @endforeach--}}
                            {{--                                    </select>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}



                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>{{__('tourism_place.name_ar')}}</label>
                                    <input  type="text"  class="form-control" name="name_ar" value="{{$tourismPlace->name_ar}}">
                                </div>
                            </div>



                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>{{__('tourism_place.name_en')}}</label>
                                    <input  type="text"  class="form-control" name="name_en" value="{{$tourismPlace->name_en}}">
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="form-group">

                                    <label for="gender">{{trans('tourism_place.tourism_country')}} <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="country_id">
                                        <option selected disabled>{{trans('tourism_place.tourism_country')}}...</option>
                                        @foreach($countries as $country)

                                            <option value="{{$country->id}}" {{$tourismPlace->city->country->name == $country->name ? 'selected' : ''}}>{{$country->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="form-group">

                                    <label for="gender">{{trans('tourism_place.tourism_city')}} <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="city_id">

                                        @foreach($cities as $city)

                                            <option value="{{$city->id}}" {{$tourismPlace->city->name == $city->name ? 'selected' : ''}}>{{$city->name}}</option>

                                        @endforeach


                                    </select>
                                </div>
                            </div>



                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>{{__('tourism_place.location_ar')}}</label>
                                    <input id="searchMapInput"  type="text"  class="form-control" placeholder="" name="location_ar" value="{{$tourismPlace->location_ar}}">
                                    <div style="display: none"  id="map"></div>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>{{__('tourism_place.location_en')}}</label>
                                    <input  id="searchMapInput2" type="text"  class="form-control" placeholder="" name="location_en" value="{{$tourismPlace->location_en}}">
                                    <div style="display: none" id="map2"></div>
                                </div>
                            </div>



                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>{{__('tourism_place.description')}}</label>
                                    <textarea  class="form-control" name="description">{{$tourismPlace->description}}</textarea>
                                </div>
                            </div>




                        </div>



                        <h6 style="font-family: 'Cairo', sans-serif;color: blue">{{__('tourism_place.images')}}</h6><br>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="academic_year">{{__('tourism_place.images')}} : <span class="text-danger">*</span></label>
                                <input type="file" name="images[]" multiple />
                            </div>
                        </div>



                        <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">{{__('admin_create.save')}}</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('scripts')

    <script>
        $(document).ready(function () {
            $('select[name="country_id"]').on('change', function () {
                var country_id = $(this).val();
                if (country_id) {
                    $.ajax({
                        url: "{{ URL::to('all-cities-by-country') }}/" + country_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="city_id"]').empty();
                            $.each(data, function (key, value) {
                                $('select[name="city_id"]').append('<option value="' + key + '">' + value + '</option>');
                            });
                        },
                    });
                } else {
                    console.log('AJAX load did not work');
                }
            });
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