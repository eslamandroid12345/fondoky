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

                                <br>                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th> {{trans('tourism_place.city_id')}}</th>
                                            <th> {{trans('tourism_place.city_name')}}</th>
                                            <th> {{trans('tourism_place.city_created_at')}}</th>
                                            <th> {{trans('tourism_place.country_of_city')}}</th>
                                        </tr>
                                        </thead>

                                        <tbody>

                                        @foreach($cities as $city)

                                            <tr>

                                                <td>{{$city->id}}</td>
                                                <td>{{$city->name}}</td>
                                                <td>{{$city->created_at->diffForHumans()}}</td>
                                                <td>{{$city->country->name}}</td>


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
