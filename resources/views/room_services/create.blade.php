@extends('layouts.master')
@section('css')
    @section('title')

اضافه خدمه جديده
    @stop
@endsection

@section('PageText')
    {{__('hotels.room_service_department')}}
@stop
@section('page-header')
    <!-- breadcrumb -->
    @section('PageTitle')
        {{__('hotels.room_service_add')}}
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

                        <form class="form" action="{{route('room-services.store')}}" method="POST" autocomplete="off">

                            @csrf


                        <h6 style="font-family: 'Cairo', sans-serif;color: blue">{{__('hotels.room_service_add')}}</h6><br>


                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>{{__('hotels.room_service_name_add')}}<span class="text-danger">*</span></label>
                                    <input  type="text"  class="form-control" name="name">
                                    <input  type="hidden"  class="form-control" name="hotel_id" value="{{auth('hotel')->id()}}">
                                </div>
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
