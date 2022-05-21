@extends('hotel_includes.layout')

@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">اضافه غرف </a>
                                </li>
                                <li class="breadcrumb-item"><a href=""> قائمه التحكم باضافه الغرف</a>
                                </li>
                                <li class="breadcrumb-item active">اضافه غرفه جديده
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
                                    <h4 class="card-title" id="basic-layout-form"> اضافه غرفه جديده </h4>
                                    <a class="heading-elements-toggle"><i
                                            class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="card-content collapse show">
                                    <div class="card-body">


                                        <form class="form" action="{{route('calendars.store')}}" method="POST">

                                            @csrf
                                            <div class="form-body">

                                                <h4 class="form-section"><i class="ft-home"></i> بيانات اضافه الغرف </h4>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">


                                                            <label for="projectinput1"> {{__('calendars.room_type')}} - </label>
                                                            <select name="room_id" class="form-control">

                                                                @foreach($rooms as $room)

                                                                    <option value="{{$room->id}}">{{$room->room_type->room_type}}</option>

                                                                @endforeach

                                                            </select>

                                                            {{-- validation --}}
                                                            <span class="text-danger"> @error('room_id') {{$message}} @enderror</span><br><br>




                                                            <label for="projectinput1"> {{__('calendars.room_number_add')}} - </label>
                                                            <input type="number" id="name" class="form-control" name="room_number" value="{{old('room_number')}}">
                                                            {{-- validation --}}
                                                            <span class="text-danger"> @error('room_number') {{$message}} @enderror</span><br><br>





                                                            <label for="projectinput1"> {{__('calendars.check_in_add')}} - </label>
                                                            <input type="date" id="name" class="form-control" name="check_in" value="{{old('check_in')}}">
                                                            {{-- validation --}}
                                                            <span class="text-danger"> @error('check_in') {{$message}} @enderror</span><br><br>


                                                            <label for="projectinput1"> {{__('calendars.check_out_add')}} - </label>
                                                            <input type="date" id="name" class="form-control" name="check_out" value="{{old('check_out')}}">
                                                            {{-- validation --}}
                                                            <span class="text-danger"> @error('check_out') {{$message}} @enderror</span><br><br>





                                                            <label for="projectinput1"> {{__('calendars.room_price_add')}} - </label>
                                                            <input type="text" id="name" class="form-control" name="room_price" value="0.00">
                                                            {{-- validation --}}
                                                            <span class="text-danger"> @error('room_price') {{$message}} @enderror</span>


                                                        </div>
                                                    </div>

                                                </div>
                                            </div>


                                            <div class="form-actions">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i>{{__('calendars.save')}}
                                                </button>
                                            </div>
                                        </form>
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


