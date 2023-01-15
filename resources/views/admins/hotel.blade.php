@extends('layouts_admin.master')
@section('css')
    @section('title')
      جميع الفنادق
    @stop
@endsection

@section('PageText')
    {{__('admin.list_of_all_hotels_on_the_site')}}
@stop

@section('page-header')
    <!-- breadcrumb -->
    @section('PageTitle')

        {{__('admin.hotels_list')}}

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
                                @if (session()->has('active'))
                                    <div class="alert alert-danger">
                                        {{session()->get('active')}}
                                    </div>
                                @endif
                                <a href="{{route('booking.all')}}" class="btn btn-success btn-sm" role="button"
                                   aria-pressed="true">{{__('sidebar_admin.bookers')}}</a>

                                    <br><br>
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th>{{__('data.name')}}</th>
                                            <th>{{__('data.location')}}</th>
                                            <th>{{__('data.pound')}}</th>
                                            <th>{{__('data.active')}}</th>
                                            <th>{{__('data.action')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($hotels as $hotel)

                                            <tr>
                                                <td>{{lang() == 'ar' ? $hotel->name_ar : $hotel->name_en}}</td>
                                                <td>{{lang() == 'ar' ? $hotel->location_ar : $hotel->location_en}}</td>
                                                <td>{{ lang() == 'ar' ? $hotel->currency_ar : $hotel->currency_en }}</td>
                                                <td>{{$hotel->active()}}</td>

                                                <td>




                                                    <div class="dropdown show">
                                                        <a class="btn btn-success btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            {{__('content.operations')}}
                                                        </a>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">

                                                            <a class="dropdown-item" href="{{route('admins.hotels/active',$hotel->id)}}"><i style="color:green" class="fa fa-edit"></i>&nbsp;{{__('content.active')}}</a>


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
