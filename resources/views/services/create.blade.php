@extends('hotel_includes.layout')

@section('content')


    @if($service->count() == 0)
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

                                        <form class="form" action="{{route('services.store')}}" method="POST">

                                            @csrf
                                            <div class="form-body">

                                                <h4 class="form-section"><i class="ft-home"></i> اضافه خدمات للفندق </h4>

                                                <div class="row">

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> اسم الخدمه - </label>
                                                            <input type="text" value="" id="name" class="form-control" name="name">
                                                            {{-- validation --}}
                                                            <span class="text-danger"> @error('name') {{$message}} @enderror</span><br><br>


                                                        </div>
                                                    </div>



                                                    <div class="col-md-12">


                                                        @foreach(config('hotel.services') as $name=>$value)
                                                            <div class="form-group">

                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" name="services[]" value="{{$name}}" id="defaultCheck1">
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

    @else

    {{--start of data services show ------------------------------------------------------------------------------------}}


    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title"> عرض الخدمات </h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">الرئيسية</a>
                                </li>
                                <li class="breadcrumb-item active">جميع الخدمات
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
                                    <h4 class="card-title">خدمات الفندق </h4>
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
                                                <th>{{__('services.name_ser')}}</th>
                                                <th>{{__('services.services_all')}}</th>


                                            </tr>
                                            </thead>


                                            @foreach($service as $ser)

                                                <tbody>
                                                <tr>

                                                    <td>{{$ser->name}}</td>
                                                    <td>
                                                        @foreach(json_decode($ser->services) as $serv)
                                                            {{$serv}}-
                                                        @endforeach
                                                    </td>


                                                    <td>
                                                        <div class="btn-group" role="group"
                                                             aria-label="Basic example">
                                                            <a href="{{route('services.edit',$ser->id)}}"
                                                               class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">تعديل</a>

                                                        </div>

                                                    </td>

                                                </tr>

                                                </tbody>
                                            @endforeach

                                        </table>
                                        <div class="justify-content-center d-flex">

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


    @endif
@endsection
