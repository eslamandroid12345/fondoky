@extends('hotel_includes.layout')

@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">غرفه الفندق </a>
                                </li>
                                <li class="breadcrumb-item"><a href=""> بيانات اغرفتي</a>
                                </li>
                                <li class="breadcrumb-item active">عرض الغرفه
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Basic form layout section start -->
                <section id="basic-form-layouts">
                    <div class="row match-height">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
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
                                    <div class="card-body">
                                            <div class="form-body">

                                                <h4 class="form-section"><i class="ft-home"></i> عرض بيانات الغرفه </h4>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">

                                                            @foreach(json_decode($room->images) as $image)

                                                                <div style="height: 300px;float: left;margin-bottom: 10px" class="col-md-4 col-sm-12 col-xs-12 col-12">
                                                                    <img style="width: 100%;height: 100%" src="{{URL::to('/rooms/'.$image)}}">
                                                                </div>



                                                            @endforeach


                                                            <label style="padding-top: 20px" for="projectinput1"> {{__('room_add.room_type')}} - </label>
                                                            <input type="text" id="name" class="form-control" value="{{$room->room_type->room_type}}">
                                                            {{-- validation --}}
                                                          <br><br>




                                                            <label for="projectinput1"> {{__('room_add.room_description')}} - </label>
                                                            <input type="text" id="name" class="form-control" value="{{$room->room_description}}">
                                                            {{-- validation --}}
                                                            <br><br>




                                                            <label for="projectinput1"> {{__('room_add.adults_max')}} - </label>
                                                            <input type="number" id="name" class="form-control" value="{{$room->adults_max}}">
                                                            {{-- validation --}}
                                                            <br><br>


                                                            <label for="projectinput1"> {{__('room_add.child_max')}} - </label>
                                                            <input type="number" id="name" class="form-control" value="{{$room->child_max}}"><br><br>
                                                            {{-- validation --}}




                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- // Basic form layout section end -->
            </div>
        </div>
    </div>

@endsection
