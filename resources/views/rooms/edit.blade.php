@extends('layouts.master')
@section('css')
    @section('title')

        اضافه غرفه جديده

    @stop
@endsection

@section('PageText')
    {{__('hotels.rooms_control')}}
@stop
@section('page-header')
    <!-- breadcrumb -->
    @section('PageTitle')
        {{__('hotels.rooms_departments')}}
    @stop
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    @if (session()->has('room'))
                        <div class="alert alert-danger">
                            {{session()->get('room')}}
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


                        <form action="{{route('rooms.update',$room->id)}}" method="post" enctype="multipart/form-data" autocomplete="off">
                            @csrf
                            @method('PUT')

                        <h6 style="font-family: 'Cairo', sans-serif;color: blue">{{__('register.update')}}</h6><br>


                        <div class="row">



                                <div class="col-md-12">
                                    <div class="form-group">
                                        @php

                                            $room_types = ["Single Room","Double Room","Twin Room","Twin/Double","Trip Room","Quadruble Room","Family Room","Suite Room","Studio Room","Apartment Room","Dormitory Room","Bed in Dormitory Room","Bungalow Room","Chalet Room","Villa Room","Holiday Home Room","Mobile Home Room","Tent Room",];

                                        @endphp

                                        <label for="gender">{{__('room_add.room_type')}} <span class="text-danger">*</span></label>
                                        <select class="custom-select mr-sm-2" name="room_type">
                                            <option selected disabled>{{__('room_add.room_type')}}...</option>
                                            @foreach($room_types as $room_type)

                                                <option value="{{$room_type}}" {{$room_type == $room->room_type ? 'selected' : ''}}>{{$room_type}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>




                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>{{__('room_add.room_description')}}</label>
                                    <textarea style="height: 120px" class="form-control"  name="room_description">{{$room->room_description}}</textarea>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>{{__('room_add.adults_max')}}</label>
                                    <input  type="number"  class="form-control" name="adults_max" value="{{$room->adults_max}}">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>{{__('room_add.child_max')}}</label>
                                    <input  type="number"  class="form-control" name="child_max" value="{{$room->child_max}}">
                                </div>
                            </div>

                        </div>



                        <h6 style="font-family: 'Cairo', sans-serif;color: blue">{{__('room_add.images')}}</h6><br>
                            <div class="row">
                                @if(count(json_decode($room->images)) == 1)
                                    @foreach(json_decode($room->images) as $image)
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-12 my-1">

                                            <img style="height: 280px" src="{{URL::to('/rooms/'.$image)}}" class="d-block w-100" alt="...">
                                        </div>
                                    @endforeach

                                @elseif(count(json_decode($room->images)) == 2)

                                    @foreach(json_decode($room->images) as $image)
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-12 my-1">

                                            <img style="height: 280px" src="{{URL::to('/rooms/'.$image)}}" class="d-block w-100" alt="...">
                                        </div>
                                    @endforeach


                                @elseif(count(json_decode($room->images)) == 3)

                                    @foreach(json_decode($room->images) as $image)
                                        <div class="col-lg-4 col-md-4 col-sm-12 col-12 my-1">

                                            <img style="height: 280px" src="{{URL::to('/rooms/'.$image)}}" class="d-block w-100" alt="...">
                                        </div>
                                    @endforeach


                                @else

                                    @foreach(json_decode($room->images) as $image)
                                        <div class="col-lg-3 col-md-3 col-sm-12 col-12 my-1">

                                            <img style="height: 280px" src="{{URL::to('/rooms/'.$image)}}" class="d-block w-100" alt="...">
                                        </div>
                                    @endforeach

                                @endif
                            </div>


                            <div class="col-md-3">
                            <div class="form-group">
                                <label for="academic_year">{{__('room_add.images')}} : <span class="text-danger">*</span></label>
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
