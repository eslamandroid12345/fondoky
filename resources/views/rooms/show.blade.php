@extends('layout_h.master')
@section('css')

@endsection
@section('title')
  عرض سجل الغرفه
@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">


                <h4 class="content-title mb-0 my-auto">{{__('hotels.rooms_departments')}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"> /
                 {{__('hotels.rooms_control')}}</span>

            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row row-sm">
        <div class="col-md-12 col-xl-12">
            <div class=" main-content-body-invoice" id="print">
                <div class="card card-invoice">
                    <div class="card-body">
                        <div class="invoice-header">
                            <h1 class="invoice-title">{{__('hotels.room_record')}}</h1>
                            
                        </div><!-- invoice-header -->
                        <div class="row mg-t-20">
                            <div class="col-md">
                                <div class="billed-to">
                                    <h6>{{__('room_add.room_description')}}</h6>
                                    <p>{{$room->room_description}}</p>
                                </div>
                            </div>
                            <div class="col-md">
                                <label class="tx-gray-600">{{__('hotels.room_information')}}</label>

                                <p class="invoice-info-row"><span>{{__('room_add.room_type')}}</span>
                                    <span>{{$room->room_type->room_type}}</span></p>
                                <p class="invoice-info-row"><span>{{__('room_add.adults_max')}}</span>
                                    <span>{{$room->adults_max}}</span></p>
                                <p class="invoice-info-row"><span>{{__('room_add.child_max')}}</span>
                                    <span>{{$room->child_max}}</span></p>

                            </div>
                        </div>
                        <hr class="mg-b-40">

                        <div class="row">
                            @if(count(json_decode($room->images)) == 1)
                                @foreach(json_decode($room->images) as $image)
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-12 my-1">

                                        <img style="height: 280px" src="{{URL::to('/rooms/'.$image)}}" class="d-block w-100" alt="...">
                                    </div>
                                @endforeach

                            @elseif(count(json_decode($room->images)) == 2)

                                @foreach(json_decode($room->images) as $image)
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-12 my-1">

                                        <img style="height: 280px" src="{{URL::to('/rooms/'.$image)}}" class="d-block w-100" alt="...">
                                    </div>
                                @endforeach


                            @elseif(count(json_decode($room->images)) == 3)

                                @foreach(json_decode($room->images) as $image)
                                    <div class="col-lg-4 col-md-4 col-sm-12 col-12 my-1">

                                        <img style="height: 280px" src="{{URL::to('/rooms/'.$image)}}" class="d-block w-100" alt="...">
                                    </div>
                                @endforeach


                            @else

                                @foreach(json_decode($room->images) as $image)
                                    <div class="col-lg-3 col-md-3 col-sm-12 col-12 my-1">

                                        <img style="height: 280px" src="{{URL::to('/rooms/'.$image)}}" class="d-block w-100" alt="...">
                                    </div>
                                @endforeach

                            @endif

                        </div>


                    </div>
                </div>
            </div>
        </div><!-- COL-END -->
    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>

    <!-- main-content closed -->
@endsection
@section('js')
    <!--Internal  Chart.bundle js -->
    <script src="{{ URL::asset('assets/plugins/chart.js/Chart.bundle.min.js') }}"></script>

@endsection
