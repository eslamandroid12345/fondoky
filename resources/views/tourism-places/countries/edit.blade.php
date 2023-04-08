@extends('layouts_admin.master')
@section('css')
    @section('title')

        اضافه دوله جديده
    @stop
@endsection

@section('PageText')
    {{trans('tourism_place.country_create')}}
@stop
@section('page-header')
    <!-- breadcrumb -->
    @section('PageTitle')
        {{trans('tourism_place.country_create')}}
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


                    <form class="form" action="{{route('tourism-places.country-update',$country->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <h6 style="font-family: 'Cairo', sans-serif;color: blue"> {{trans('tourism_place.country_create')}}</h6><br>
                        <div class="row">



                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>{{trans('tourism_place.country_name_store')}}</label>
                                    <input  class="form-control" name="name" value="{{$country->name}}">
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
