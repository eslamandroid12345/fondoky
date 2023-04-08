@extends('layouts_admin.master')
@section('css')
    @section('title')
       جميع الاماكن السياحيه
    @stop
@endsection

@section('PageText')
    {{trans('tourism_place.header_tourism_places')}}
@stop

@section('page-header')
    <!-- breadcrumb -->
    @section('PageTitle')

        {{trans('tourism_place.header_tourism_places')}}

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
                                @if (session()->has('tourism_place_add'))
                                    <div class="alert alert-danger">
                                        {{session()->get('tourism_place_add')}}
                                    </div>
                                @endif

                                @if (session()->has('tourism_place_update'))
                                    <div class="alert alert-danger">
                                        {{session()->get('tourism_place_update')}}
                                    </div>
                                @endif


                                {{--end validate--}}

                                {{--

                                    "tourism_places_id" => "رمز المكان",
                                    "tourism_places_name_ar" => "اسم المكان السياحي باللغه العربيه",
                                    "tourism_places_name_en" => "اسم المكان السياحي باللغه الانجليزيه",
                                    "tourism_places_location_ar" => "موقع المكان باللغه العربيه",
                                    "tourism_places_location_en" => "موقع المكان باللغه الانجليزيه",
                                    "tourism_places_city" => "اسم المحافظه التابعه لها",
                                    "tourism_places_update" => "تعديل المكان",
                                    "tourism_places_delete" => "حذف المكان",

                                --}}

                                <a href="{{route('tourism-places.create')}}" class="btn btn-success btn-sm" role="button"
                                   aria-pressed="true">{{trans('tourism_place.tourism_places_create')}}</a><br><br>                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th> {{trans('tourism_place.tourism_places_id')}}</th>
                                            <th> {{trans('tourism_place.tourism_places_name_ar')}}</th>
                                            <th> {{trans('tourism_place.tourism_places_name_en')}}</th>
                                            <th> {{trans('tourism_place.tourism_places_location_ar')}}</th>
                                            <th> {{trans('tourism_place.tourism_places_location_en')}}</th>
                                            <th> {{trans('tourism_place.tourism_places_city')}}</th>
                                            <th>{{__('data.action')}}</th>
                                        </tr>
                                        </thead>

                                        <tbody>

                                        @foreach($tourismPlaces as $tourismPlace)

                                            <tr>

                                                <td>{{$tourismPlace->id}}</td>
                                                <td>{{$tourismPlace->name_ar}}</td>
                                                <td>{{$tourismPlace->name_en}}</td>
                                                <td>{{$tourismPlace->location_ar}}</td>
                                                <td>{{$tourismPlace->location_en}}</td>
                                                <td>{{$tourismPlace->city->name}}</td>


                                                <td>
                                                    <div class="dropdown show">
                                                        <a class="btn btn-success btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            {{__('content.operations')}}
                                                        </a>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">

                                                            <a class="dropdown-item" href="{{route('tourism-places.edit',$tourismPlace->id)}}"><i style="color:green" class="fa fa-edit"></i>&nbsp;{{trans('tourism_place.tourism_places_update')}}</a>
                                                            <a class="dropdown-item" href="{{route('tourism-places.delete',$tourismPlace->id)}}"><i style="color:green" class="fa fa-trash"></i>&nbsp;{{trans('tourism_place.tourism_places_delete')}}</a>


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
