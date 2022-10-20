

@extends('layouts.master')
@section('css')
    @section('title')

تعديل خدمات الفندق
    @stop
@endsection

@section('PageText')
    {{__('hotels.service_create')}}
@stop
@section('page-header')
    <!-- breadcrumb -->
    @section('PageTitle')
        {{__('hotels.services_departments')}}
    @stop
    <!-- breadcrumb -->
@endsection
@section('content')

<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                @if (session()->has('create'))
                    <div class="alert alert-danger">
                        {{session()->get('create')}}
                    </div>
                @endif

                @if (session()->has('update_service'))
                    <div class="alert alert-danger">
                        {{session()->get('update_service')}}
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

                    <form class="form" action="{{route('services.update',$service->id)}}" method="POST" autocomplete="off">

                        @csrf
                        @method('PUT')

                        <h6 style="font-family: 'Cairo', sans-serif;color: blue">{{__('hotels.service_create')}}</h6><br>


                    <div class="row">

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>{{__('hotels.service_name')}}<span class="text-danger">*</span></label>
                                <input  type="text"  class="form-control" name="name" value="{{$service->name}}">
                            </div>
                        </div>

                        <div class="col-md-12">
                            @foreach(config('hotel.services') as $name=>$value)
                                <div class="form-group">

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="services[]" value="{{$name}}" id="defaultCheck1" value="{{$name}}" id="defaultCheck1" {{ in_array($name,json_decode($service->services))? 'checked' : ''}}>
                                        <label class="form-check-label" for="defaultCheck1">{{$value}}</label>
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