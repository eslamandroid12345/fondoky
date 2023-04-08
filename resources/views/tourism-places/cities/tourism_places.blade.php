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

                              <br>                                <div class="table-responsive">
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

