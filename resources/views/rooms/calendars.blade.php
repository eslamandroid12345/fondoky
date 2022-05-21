@extends('hotel_includes.layout')

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title"> عرض الفنادق </h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">الرئيسية</a>
                                </li>
                                <li class="breadcrumb-item active"> الاقسام الرئيسية
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- DOM - jQuery events table -->

                <section id="dom">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">{{__('rooms_calendars.calendars')}}</h4>
                                    <a class="heading-elements-toggle"><i
                                            class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        </ul>
                                    </div>
                                </div>


                                <div class="card-content collapse show">

                                    <div class="card-body card-dashboard">


                                        <table style="width: 100%"
                                               class="table display nowrap table-striped table-bordered scroll-horizontal">
                                            <thead class="">
                                            <tr>

                                                <th>{{__('rooms_calendars.room_type')}}</th>
                                                <th>{{__('rooms_calendars.room_number')}}</th>
                                                <th>{{__('rooms_calendars.room_price')}}</th>
                                                <th>{{__('rooms_calendars.check_in')}}</th>
                                                <th>{{__('rooms_calendars.check_out')}}</th>
                                                <th>{{__('rooms_calendars.control')}}</th>


                                            </tr>
                                            </thead>


                                            @foreach($calendars as $calendar)

                                                <tbody>
                                                <tr>


                                                    <td>{{$calendar->room->room_type->room_type}}</td>
                                                    <td>{{$calendar->room_number}}</td>
                                                    <td>{{number_format($calendar->room_price,2) . '-'. $calendar->room->hotel->pound}}</td>
                                                    <td>{{$calendar->check_in}}</td>
                                                    <td>{{$calendar->check_out}}</td>
                                                    <td>
                                                    <a class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1"  href="{{route('calendars.delete',$calendar->id)}}">{{__('room_add.delete')}}</a>
                                                    <a class="btn btn-outline-warning btn-min-width box-shadow-3 mr-1 mb-1"  href="{{route('calendars.edit',$calendar->id)}}">{{__('room_add.update')}}</a>

                                                    </td>


                                                </tr>

                                                </tbody>
                                            @endforeach

                                        </table>
                                        <div class="justify-content-center d-flex">

                                            {{ $calendars->links() }}

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>



@endsection
