@extends('layouts.master')
@section('css')
    @section('title')

      اضافه خمات للغرفه
    @stop
@endsection

@section('PageText')
    {{__('hotels.hotel_room_service_insert')}}
@stop
@section('page-header')
    <!-- breadcrumb -->
    @section('PageTitle')
        {{__('hotels.hotel_room_service_department')}}
    @stop
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    @if (session()->has('create'))
                        <div class="alert alert-danger">
                            {{session()->get('create')}}
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


                        <form action="{{route('hotel-room-services.store')}}" method="post" autocomplete="off">

                            @csrf

                        <h6 style="font-family: 'Cairo', sans-serif;color: blue">  {{__('hotels.hotel_room_service_department')}}</h6><br>


                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-group">

                                        <label for="gender">{{__('room_add.room_type')}} <span class="text-danger">*</span></label>
                                        <select class="custom-select mr-sm-2" name="room_id">
                                            <option selected disabled>{{__('room_add.room_type')}}...</option>
                                            @foreach($rooms as $room)
                                                <option value="{{$room->id}}">{{$room->room_type}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    @foreach($room_services as $room_service)
                                        <div class="form-group">

                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="room_service_id[]" value="{{$room_service->id}}" id="defaultCheck1">
                                                <label class="form-check-label" for="defaultCheck1">{{$room_service->name}}</label>
                                            </div>

                                        </div>
                                    @endforeach
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
