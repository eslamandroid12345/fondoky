@extends('layouts_admin.master')
@section('css')
    @section('title')
        جميع المحافاظات
    @stop
@endsection

@section('PageText')
    {{trans('tourism_place.header_cities')}}
@stop

@section('page-header')
    <!-- breadcrumb -->
    @section('PageTitle')

        {{trans('tourism_place.header_cities')}}

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
                                @if (session()->has('city_add'))
                                    <div class="alert alert-danger">
                                        {{session()->get('city_add')}}
                                    </div>
                                @endif

                                @if (session()->has('city_update'))
                                    <div class="alert alert-danger">
                                        {{session()->get('city_update')}}
                                    </div>
                                @endif


                                {{--end validate--}}

                                {{--

                            //foreach all data of cities
                            "city_id" => "City Code",
                            "city_name" => "Country Name",
                            "country_of_city" => "Country of City",
                            "city_created_at" => "date added",
                            "city_update" => "City Update",
                            "city_delete" => "delete province",


                                --}}

                                <a href="{{route('tourism-places.city-create')}}" class="btn btn-success btn-sm" role="button"
                                   aria-pressed="true">{{trans('tourism_place.city_places_create')}}</a><br><br>                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th> {{trans('tourism_place.city_id')}}</th>
                                            <th> {{trans('tourism_place.city_name')}}</th>
                                            <th> {{trans('tourism_place.city_created_at')}}</th>
                                            <th> {{trans('tourism_place.country_of_city')}}</th>
                                            <th>{{__('data.action')}}</th>
                                        </tr>
                                        </thead>

                                        <tbody>

                                        @foreach($cities as $city)

                                            <tr>

                                                <td>{{$city->id}}</td>
                                                <td>{{$city->name}}</td>
                                                <td>{{$city->created_at->diffForHumans()}}</td>
                                                <td>{{$city->country->name}}</td>


                                                <td>
                                                    <div class="dropdown show">
                                                        <a class="btn btn-success btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            {{__('content.operations')}}
                                                        </a>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">

                                                            <a class="dropdown-item" href="{{route('tourism-places.city-edit',$city->id)}}"><i style="color:green" class="fa fa-edit"></i>&nbsp;{{trans('tourism_place.city_update')}}</a>
                                                            <a class="dropdown-item" href="{{route('tourism-places.city-delete',$city->id)}}"><i style="color:green" class="fa fa-edit"></i>&nbsp;{{trans('tourism_place.city_delete')}}</a>
                                                            <a class="dropdown-item" href="{{route('tourism-places-by-city',$city->id)}}"><i style="color:green" class="fa fa-edit"></i>&nbsp;{{trans('tourism_place.tourism_places_of_city')}}</a>

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
