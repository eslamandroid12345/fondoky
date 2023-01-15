@extends('layouts.master')
@section('css')
    @section('title')
        عرض تقويمات الغرفه
    @stop
@endsection

@section('PageText')
    {{__('hotels.calendars_edit')}}
@stop

@section('page-header')
    <!-- breadcrumb -->
    @section('PageTitle')

        {{__('rooms_calendars.calendars')}}

    @stop
    <!-- breadcrumb -->
@endsection
@section('content')


    {{--start model body--}}
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{__('rooms_calendars.calendars')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{--start div form of search--}}
                    <div>
                        <div>
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                                        {{__('hotels.calendars_edit')}}
                                    </h5>

                                </div>
                                <div class="modal-body">
                                    <form  action="{{route('rooms.calendars.show',$id)}}" method="GET" autocomplete="off">

                                        <div class="row">
                                            <div class="col-12">
                                                <label for="Name" class="mr-sm-2">{{__('calendars.check_in_add')}}
                                                    :</label>
                                                <input  type="text" class="form-control"  id="datepicker-action" name="check_in" data-date-format="yyyy-mm-dd" value="{{\Carbon\Carbon::now()->format('Y-m-d')}}">
                                            </div>
                                            <div class="col-12">
                                                <label for="Name_en" class="mr-sm-2">{{__('calendars.check_out_add')}}
                                                    :</label>
                                                <input type="text" class="form-control"  id="datepicker-action-2" name="check_out" data-date-format="yyyy-mm-dd" value="{{\Carbon\Carbon::now()->addDays(1)->format('Y-m-d')}}">
                                            </div>

                                            <div class="col mt-3">
                                                <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">{{__('book.search')}}</button>

                                            </div>
                                        </div>

                                        <br><br>
                                    </form>
                                </div>

                                </form>

                            </div>
                        </div>
                    </div>

                    {{--end div form of search--}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    {{--end model body--}}
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="col-xl-12 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                               
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th>{{__('rooms_calendars.room_type')}}</th>
                                            <th>{{__('rooms_calendars.room_number')}}</th>
                                            <th>{{__('rooms_calendars.room_price')}}</th>
                                            <th>{{__('rooms_calendars.check_in')}}</th>
                                            <th>{{__('rooms_calendars.check_out')}}</th>
                                            <th>{{__('rooms_calendars.control')}}</th>

                                        </tr>
                                        </thead>


                                        <tbody>
                                        @foreach($calendars as $calendar)

                                            <tr>
                                                <td>{{$calendar->room->room_type}}</td>
                                                <td>{{$calendar->room_number}}</td>
                                                <td>{{ lang() == 'ar' ? number_format($calendar->room_price,2) . '-'. $calendar->room->hotel->currency_ar : number_format($calendar->room_price,2) . '-'. $calendar->room->hotel->currency_en }}</td>
                                                <td>{{$calendar->check_in}}</td>
                                                <td>{{$calendar->check_out}}</td>

                                                <td>


                                                    <div class="dropdown show">
                                                        <a class="btn btn-success btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            {{__('content.operations')}}
                                                        </a>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">


                                                            <a class="dropdown-item" href="{{route('calendars.edit',$calendar->id)}}"><i style="color:green" class="fa fa-edit"></i>&nbsp;{{__('room_add.update')}}</a>


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
