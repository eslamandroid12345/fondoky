@extends('site.layout')

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title"> {{__('site.book')}} </h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">{{__('site.up')}}</a>
                                </li>
                                <li class="breadcrumb-item active">{{__('site.my_booking')}}
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
                                    <h4 class="card-title">{{__('site.all')}} </h4>
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

                                        @if($message = Session::get('success'))
                                            <div id="alert" class="row mr-2 ml-2">
                                                <button type="text" class="btn btn-lg btn-block btn-outline-success mb-2"
                                                        id="type-error">{{$message}}
                                                </button>
                                            </div>
                                        @endif
                                        <table style="width: 100%"
                                               class="table display nowrap table-striped table-bordered scroll-horizontal">
                                            <thead class="">
                                            <tr>


                                                <th>{{__('site.id')}}</th>
                                                <th>{{__('site.city')}}</th>
                                                <th>{{__('site.child')}}</th>
                                                <th>{{__('site.adults')}}</th>
                                                <th>{{__('site.room_type')}}</th>
                                                <th>{{__('site.room_number')}}</th>
                                                <th>{{__('site.num_of_nights')}}</th>
                                                <th>{{__('site.date_arrive')}}</th>
                                                <th>{{__('site.date_leave')}}</th>
                                                <th>{{__('site.hotel')}}</th>
                                                <th>{{__('site.total')}}</th>
                                                <th>{{__('site.reserve')}}</th>
                                                <th>{{__('site.cancel')}}</th>
                                            </tr>
                                            </thead>

                                            @forelse($bookers as $booker)
                                            <tbody>

                                            <tr>

                                                <td>{{$booker->id}}</td>
                                                <td>{{$booker->city_to}}</td>
                                                <td>{{$booker->children}}</td>
                                                <td>{{$booker->adults}}</td>
                                                <td>{{$booker->room_type}}</td>
                                                <td>{{$booker->room_number}}</td>
                                                <td>{{$booker->num_of_nights}}</td>
                                                <td>{{$booker->date_arrive}}</td>
                                                <td>{{$booker->date_leave}}</td>
                                                <td>{{lang() == 'ar' ? $booker->hotel->name_ar : $booker->hotel->name_en}}</td>
                                                <td>{{number_format($booker->total_all,2)}} - {{$booker->hotel->pound}}</td>
                                                <td>{{$booker->cancel()}}</td>

                                                <td>
                                                    <div class="btn-group" role="group"
                                                         aria-label="Basic example">

                                                        @if($booker->canceled == 1)

                                                        <a href="{{route('bookers.cancel',$booker->id)}}"
                                                           class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">{{__('site.cancel')}}</a>

                                                            @else

                                                            <a href=""
                                                               class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">{{__('site.canceled')}}</a>


                                                        @endif
                                                    </div>

                                                </td>
                                            </tr>


                                            </tbody>
                                                @empty
                                                <h6>No booking</h6>
                                                @endforelse
                                        </table>
                                        <div class="justify-content-center d-flex">
                                          {{$bookers->links()}}
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
