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


                        <form class="form" action="{{route('rooms.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf


                            <h6 style="font-family: 'Cairo', sans-serif;color: blue"> {{__('hotels.rooms_control')}}</h6><br>


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

                                            <option value="{{$room_type}}">{{$room_type}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="form-group">
                                    @php

                                         $smokes = [
                                           "Yes" => 1,
                                           "No" => 0

                                           ];

                                    @endphp

                                    <label for="gender">{{__('room.smoke_add')}} <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="smoke">
                                        <option selected disabled>{{__('room.smoke_add')}}...</option>
                                        @foreach($smokes as $key=>$value)

                                            <option value="{{$value}}">{{$key}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>



                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>{{__('room_add.room_description')}}</label>
                                    <textarea  class="form-control" name="room_description" ></textarea>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>{{__('room_add.adults_max')}}</label>
                                    <input  type="number"  class="form-control" name="adults_max" value="{{old('adults_max')}}">
                                </div>
                            </div>

                                  <div class="col-md-12">
                                <div class="form-group">
                                    <label>{{__('room_add.child_max')}}</label>
                                    <input  type="number"  class="form-control" name="child_max" value="{{old('child_max')}}">
                                </div>
                            </div>

                        </div>



                        <h6 style="font-family: 'Cairo', sans-serif;color: blue">{{__('room_add.images')}}</h6><br>

                        <div class="col-md-12">
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
