@extends('hotel_includes.layout')

@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">الرئيسية </a>
                                </li>
                                <li class="breadcrumb-item"><a href=""> اضافه خدمات الفندق</a>
                                </li>
                                <li class="breadcrumb-item active">اضافه خدمات عامه لفندقي
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
                                    <h4 class="card-title" id="basic-layout-form"> خدمات فندقي </h4>
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

                                        <form class="form" action="{{route('services.update',$service->id)}}" method="POST">

                                            @csrf
                                            @method('PUT')
                                            <div class="form-body">

                                                <h4 class="form-section"><i class="ft-home"></i> تحديث بيانات الخدمه </h4>

                                                <div class="row">

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> اسم الخدمه - </label>
                                                            <input type="text" value="{{$service->name}}" id="name" class="form-control" name="name">
                                                            {{-- validation --}}
                                                            <span class="text-danger"> @error('name') {{$message}} @enderror</span><br><br>


                                                        </div>
                                                    </div>



                                                    <div class="col-md-12">


                                                        @foreach(config('hotel.services') as $name=>$value)
                                                            <div class="form-group">

                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" name="services[]" value="{{$name}}" id="defaultCheck1" {{ in_array($name,json_decode($service->services))? 'checked' : ''}}>
                                                                    <label class="form-check-label" for="defaultCheck1">{{$value}}</label>
                                                                </div>

                                                            </div>
                                                        @endforeach

                                                        <span class="text-danger"> @error('services') {{$message}} @enderror</span><br><br>

                                                    </div>


                                                </div>
                                            </div>


                                            <div class="form-actions">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i> حفظ
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
