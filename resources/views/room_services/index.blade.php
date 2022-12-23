@extends('layouts.master')
@section('css')
    @section('title')
        تعديل الخدمه
    @stop
@endsection

@section('PageText')
    {{__('hotels.room_service_department')}}
@stop

@section('page-header')
    <!-- breadcrumb -->
    @section('PageTitle')

        {{__('hotels.room_service_show')}}
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
                                @if (session()->has('update'))
                                    <div class="alert alert-danger">
                                        {{session()->get('update')}}
                                    </div>
                                @endif

                                @if (session()->has('delete'))
                                    <div class="alert alert-danger">
                                        {{session()->get('delete')}}
                                    </div>
                                @endif
                                {{--end validate--}}
                                <a href="{{route('room-services.create')}}" class="btn btn-success btn-sm" role="button"
                                   aria-pressed="true">{{__('hotels.room_service_add')}}</a><br><br>
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th>{{__('hotels.room_service_id')}}</th>
                                            <th>{{__('hotels.room_service_name_show')}}</th>
                                            <th>{{__('hotels.room_service_control')}}</th>

                                        </tr>
                                        </thead>



                                        @foreach($Services as $service)

                                            <tbody>
                                            <tr>

                                                <td>{{$service->id}}</td>
                                                <td>{{$service->name}}</td>

                                                <td>
                                                    <div class="dropdown show">
                                                        <a class="btn btn-success btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            {{__('content.operations')}}
                                                        </a>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">


                                                            <a class="dropdown-item" href="{{route('room-services.edit',$service->id)}}"><i style="color:green" class="fa fa-edit"></i>&nbsp;{{__('hotels.room_service_update_show')}}</a>
                                                            <a class="dropdown-item" href="{{route('room-services.delete',$service->id)}}"><i style="color:green" class="fa fa-edit"></i>&nbsp;{{__('hotels.room_service_delete_show')}}</a>


                                                        </div>
                                                    </div>

                                                </td>

                                            </tr>

                                            </tbody>
                                        @endforeach


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
