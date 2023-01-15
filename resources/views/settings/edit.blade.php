@extends('layouts_admin.master')
@section('css')
    @section('title')

        اضافه اعدادات التطبيق

    @stop
@endsection

@section('PageText')
    {{__('sidebar_admin.settings')}}
@stop
@section('page-header')
    <!-- breadcrumb -->
    @section('PageTitle')
        {{__('sidebar_admin.settings')}}

    @stop
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif


                    <form class="row mb-30" action="{{route('settings.update',$setting->id)}}" method="POST" enctype="multipart/form-data" autocomplete="off">
                        @csrf
                        @method('PUT')

                        <div class="card-body">
                            <div class="row">

                                <div class="col-lg-6 col-md-12 col-12">
                                    <label for="Name"
                                           class="mr-sm-2">{{trans('setting.logo')}}
                                        :</label>
                                    <input class="form-control" type="file" name="logo">
                                </div>

                                <div class="col-lg-6 col-md-12 col-12">
                                    <label for="Name"
                                           class="mr-sm-2 mt-3">{{trans('setting.name_ar')}}
                                        :</label>
                                    <input class="form-control" type="text" name="name_ar" value="{{$setting->name_ar}}">
                                </div>


                                <div class="col-lg-6 col-md-12 col-12">
                                    <label for="Name"
                                           class="mr-sm-2 mt-3">{{trans('setting.name_en')}}
                                        :</label>
                                    <input class="form-control" type="text" name="name_en"  value="{{$setting->name_en}}">
                                </div>

                                <div class="col-lg-6 col-md-12 col-12">
                                    <label for="Name"
                                           class="mr-sm-2 mt-3">{{trans('setting.about_ar')}}
                                        :</label>
                                    <input class="form-control" type="text" name="about_ar"  value="{{$setting->about_ar}}">
                                </div>

                                <div class="col-lg-6 col-md-12 col-12">
                                    <label for="Name"
                                           class="mr-sm-2 mt-3">{{trans('setting.about_en')}}
                                        :</label>
                                    <input class="form-control" type="text" name="about_en"  value="{{$setting->about_en}}">
                                </div>

                                <div class="col-lg-6 col-md-12 col-12">
                                    <label for="Name"
                                           class="mr-sm-2 mt-3">{{trans('setting.privacy_ar')}}
                                        :</label>
                                    <input class="form-control" type="text" name="privacy_ar"  value="{{$setting->privacy_ar}}">
                                </div>

                                <div class="col-lg-6 col-md-12 col-12">
                                    <label for="Name"
                                           class="mr-sm-2 mt-3">{{trans('setting.privacy_en')}}
                                        :</label>
                                    <input class="form-control" type="text" name="privacy_en"  value="{{$setting->privacy_en}}">
                                </div>

                                <div class="col-lg-6 col-md-12 col-12">
                                    <label for="Name"
                                           class="mr-sm-2 mt-3">{{trans('setting.location_ar')}}
                                        :</label>
                                    <input class="form-control" type="text" name="location_ar"  value="{{$setting->location_ar}}">
                                </div>


                                <div class="col-lg-12 col-md-12 col-12">
                                    <label for="Name"
                                           class="mr-sm-2 mt-3">{{trans('setting.location_en')}}
                                        :</label>
                                    <input class="form-control" type="text" name="location_en"  value="{{$setting->location_en}}">
                                </div>

                            </div><br>

                            <button type="submit"
                                    class="btn btn-success">{{ trans('setting.save') }}</button>


                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
