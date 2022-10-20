@extends('layouts.master')
@section('css')
    @section('title')
        عرض الغرف
    @stop
@endsection

@section('PageText')
    {{__('hotels.rooms_control')}}
@stop

@section('page-header')
    <!-- breadcrumb -->
    @section('PageTitle')

        {{__('hotels.rooms_departments')}}

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
                                @if (session()->has('room'))
                                    <div class="alert alert-danger">
                                        {{session()->get('room')}}
                                    </div>
                                @endif

                                @if (session()->has('room_update'))
                                    <div class="alert alert-danger">
                                        {{session()->get('room_update')}}
                                    </div>
                                @endif
                                {{--end validate--}}

                                <a href="{{route('rooms.create')}}" class="btn btn-success btn-sm" role="button"
                                   aria-pressed="true">{{__('hotel_sidebar.room_add')}}</a><br><br>                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th>{{__('room_add.room_type')}}</th>
                                            <th>{{__('room_add.adults_max')}}</th>
                                            <th>{{__('room_add.child_max')}}</th>
                                            <th>{{__('data.action')}}</th>
                                        </tr>
                                        </thead>


                                    @foreach($rooms as $room)

                                            <tbody>
                                            <tr>

                                                <td>{{$room->room_type}}</td>
                                                <td>{{$room->adults_max}}</td>
                                                <td>{{$room->child_max}}</td>

                                                <td>
                                                    <div class="dropdown show">
                                                        <a class="btn btn-success btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            {{__('content.operations')}}
                                                        </a>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">


                                                            <a class="dropdown-item" href="{{route('rooms.edit',$room->id)}}"><i style="color:green" class="fa fa-edit"></i>&nbsp;{{__('room_add.update')}}</a>
                                                            <a class="dropdown-item" href="{{route('calendars.create',$room->id)}}"><i style="color:green" class="fa fa-edit"></i>&nbsp;{{__('hotels.calendar_create')}}</a>
                                                            <a class="dropdown-item" href="{{route('rooms.calendars.show',$room->id)}}"><i style="color:green" class="fa fa-edit"></i>&nbsp;{{__('hotels.calendars')}}</a>


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
