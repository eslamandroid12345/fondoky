@extends('layouts_admin.master')
@section('css')
    @section('title')
       عرض الدول
    @stop
@endsection

@section('PageText')
    {{trans('tourism_place.header_countries')}}
@stop

@section('page-header')
    <!-- breadcrumb -->
    @section('PageTitle')

        {{trans('tourism_place.header_countries')}}

    @stop
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="col-xl-12 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                {{--start validate--}}
                                @if (session()->has('country_add'))
                                    <div class="alert alert-danger">
                                        {{session()->get('country_add')}}
                                    </div>
                                @endif

                                @if (session()->has('country_update'))
                                    <div class="alert alert-danger">
                                        {{session()->get('country_update')}}
                                    </div>
                                @endif


                                @if (session()->has('country_delete'))
                                    <div class="alert alert-danger">
                                        {{session()->get('country_delete')}}
                                    </div>
                                @endif


                                {{--end validate--}}

                                {{--

                                 //for each data of countries
                                "country_id" => "country code",
                                "country_name" => "country name",
                                "country_created_at" => "date added",
                                "country_update" => "Update Country Name",
                                "country_delete" => "delete country",

                                --}}

                                <a href="{{route('tourism-places.country-create')}}" class="btn btn-success btn-sm" role="button"
                                   aria-pressed="true">{{trans('tourism_place.country_create')}}</a><br><br>                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th> {{trans('tourism_place.country_id')}}</th>
                                            <th> {{trans('tourism_place.country_name')}}</th>
                                            <th> {{trans('tourism_place.country_created_at')}}</th>
                                            <th>{{__('data.action')}}</th>
                                        </tr>
                                        </thead>

                                        <tbody>

                                        @foreach($countries as $country)

                                            <tr>

                                                <td>{{$country->id}}</td>
                                                <td>{{$country->name}}</td>
                                                <td>{{$country->created_at->diffForHumans()}}</td>


                                                <td>
                                                    <div class="dropdown show">
                                                        <a class="btn btn-success btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            {{__('content.operations')}}
                                                        </a>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">

                                                            <a class="dropdown-item" href="{{route('tourism-places.country-edit',$country->id)}}"><i style="color:green" class="fa fa-edit"></i>&nbsp;{{trans('tourism_place.country_update')}}</a>
                                                            <a class="dropdown-item" href="{{route('tourism-places.country-delete',$country->id)}}"><i style="color:green" class="fa fa-edit"></i>&nbsp;{{trans('tourism_place.country_delete')}}</a>
                                                            <a class="dropdown-item" href="{{route('cities-by-country',$country->id)}}"><i style="color:green" class="fa fa-edit"></i>&nbsp;{{trans('tourism_place.cities_of_country')}}</a>


                                                        </div>
                                                    </div>

                                                </td>

                                            </tr>

                                        @endforeach
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')

@endsection
