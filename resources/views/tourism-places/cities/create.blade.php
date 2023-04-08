@extends('layouts_admin.master')
@section('css')
    @section('title')

        اضافه محافظه جديده
    @stop
@endsection

@section('PageText')
    {{trans('tourism_place.city_places_create')}}
@stop
@section('page-header')
    <!-- breadcrumb -->
    @section('PageTitle')
        {{trans('tourism_place.city_places_create')}}
    @stop
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">



                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif


                    <form class="form" action="{{route('tourism-places.city-store')}}" method="POST">
                        @csrf

                        <h6 style="font-family: 'Cairo', sans-serif;color: blue"> {{trans('tourism_place.city_places_create')}}</h6><br>
                        <div class="row">


                            <div class="col-md-12">
                                <div class="form-group">

                                    <label for="gender">{{trans('tourism_place.country_name_store')}} <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="country_id">
                                        <option selected disabled>{{trans('tourism_place.country_name_store')}}...</option>
                                        @foreach($countries as $country)

                                            <option value="{{$country->id}}">{{$country->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>{{trans('tourism_place.city_name_store')}}</label>
                                    <input  class="form-control" name="name">
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
