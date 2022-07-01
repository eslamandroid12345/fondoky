@extends('layout_h.master')
@section('css')
    <!--- Internal Select2 css-->
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <!---Internal Fileupload css-->
    <link href="{{ URL::asset('assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />
    <!---Internal Fancy uploader css-->
    <link href="{{ URL::asset('assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />
    <!--Internal Sumoselect css-->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/sumoselect/sumoselect-rtl.css') }}">
    <!--Internal  TelephoneInput css-->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/telephoneinput/telephoneinput-rtl.css') }}">
@endsection
@section('title')
    تعديل بيانات الفندق
@stop

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{__('hotels.profile')}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                   {{__('register.update')}} </span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')

    @if (session()->has('current_password'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('current_password') }}</strong>

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif


    <!-- row -->
    <div class="row">

        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">

                    <form method="POST" action="{{ route('hotels.update',$hotel->id) }}" enctype="multipart/form-data" autocomplete="off">
                        @csrf
                        @method('PUT')

                        <div class="row">


                            <div class="col-lg-4 col-md-4 col-sm-12 mt-3">
                                <label for="inputName" class="control-label">{{ __('register.country') }}</label>
                                <input type="text" class="form-control" id="inputName" name="country" value="{{$hotel->country}}">
                                <span class="text-danger"> @error('country') {{$message}} @enderror</span>

                            </div>


                            <div class="col-lg-4 col-md-4 col-sm-12 mt-3">
                                <label for="inputName" class="control-label">{{ __('register.country_en') }}</label>
                                <input type="text" class="form-control" id="inputName" name="country_en" value="{{$hotel->country_en}}">
                                <span class="text-danger"> @error('country_en') {{$message}} @enderror</span>

                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-12 mt-3">
                                <label for="inputName" class="control-label">{{ __('register.manger') }}</label>
                                <input type="text" class="form-control" id="inputName" name="manger" value="{{$hotel->manger}}">
                                <span class="text-danger"> @error('manger') {{$message}} @enderror</span>

                            </div>


                            <div class="col-lg-4 col-md-4 col-sm-12 mt-3">
                                <label for="inputName" class="control-label">{{ __('register.name_ar') }}</label>
                                <input type="text" class="form-control" id="inputName" name="name_ar" value="{{$hotel->name_ar}}">
                                <span class="text-danger"> @error('name_ar') {{$message}} @enderror</span>

                            </div>


                            <div class="col-lg-4 col-md-4 col-sm-12 mt-3">
                                <label for="inputName" class="control-label">{{ __('register.name_en') }}</label>
                                <input type="text" class="form-control" id="inputName" name="name_en" value="{{$hotel->name_en}}">
                                <span class="text-danger"> @error('name_en') {{$message}} @enderror</span>

                            </div>


                            <div class="col-lg-4 col-md-4 col-sm-12 mt-3">
                                <label for="inputName" class="control-label">{{ __('register.location_ar') }}</label>
                                <input type="text" class="form-control" id="inputName" name="location_ar" value="{{$hotel->location_ar}}">
                                <span class="text-danger"> @error('location_ar') {{$message}} @enderror</span>

                            </div>


                            <div class="col-lg-4 col-md-4 col-sm-12 mt-3">
                                <label for="inputName" class="control-label">{{ __('register.location_en') }}</label>
                                <input type="text" class="form-control" id="inputName" name="location_en" value="{{$hotel->location_en}}">
                                <span class="text-danger"> @error('location_en') {{$message}} @enderror</span>

                            </div>


                            <div class="col-lg-4 col-md-4 col-sm-12 mt-3">
                                <label for="inputName" class="control-label">{{ __('register.email') }}</label>
                                <input type="email" class="form-control" id="inputName" name="email" value="{{$hotel->email}}">
                                <span class="text-danger"> @error('email') {{$message}} @enderror</span>

                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-12 mt-3">
                                <label for="inputName" class="control-label">{{ __('register.current_password') }}</label>
                                <input type="password" class="form-control" id="inputName" name="current_password">
                                <span class="text-danger"> @error('current_password') {{$message}} @enderror</span>

                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-12 mt-3">
                                <label for="inputName" class="control-label">{{ __('register.new_password') }}</label>
                                <input type="password" class="form-control" id="inputName" name="password">
                                <span class="text-danger"> @error('password') {{$message}} @enderror</span>

                            </div>





                            <div class="col-lg-4 col-md-4 col-sm-12 mt-3">
                                <label for="inputName" class="control-label">{{ __('register.confirm_password') }}</label>
                                <input type="password" class="form-control" id="inputName" name="confirm_password">
                                <span class="text-danger"> @error('confirm_password') {{$message}} @enderror</span>

                            </div>





                            <div class="col-lg-4 col-md-4 col-sm-12 mt-3">
                                <label for="inputName" class="control-label">{{ __('register.pound') }}</label>
                                @php
                                    $currencies_ar = ["ريال السعودي ","دولار الامريكي","يورو","درهم الاماراتي","دينار البحريني","جنيه المصري","جنيه البريطاني","دينار الكويتي","ريال العماني","ريال القطري"];

                                @endphp
                                <select name="pound" class="form-control SlectBox" onclick="console.log($(this).val())"
                                        onchange="console.log('change is firing')">

                                    @foreach($currencies_ar as $currency)
                                        <option value="{{$currency}}" {{$hotel->pound == $currency ? 'selected' : ''}}>{{$currency}}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"> @error('pound') {{$message}} @enderror</span>

                            </div>



                               <div class="col-lg-4 col-md-4 col-sm-12 mt-3">
                                <label for="inputName" class="control-label">{{ __('register.currency_en') }}</label>
                                @php

                                    $currencies_en = ["SAR","USD","EUR","AED","BHD","EGP","GPP","KWD","OMR","QAR"];

                                @endphp
                                <select name="currency_en" class="form-control SlectBox" onclick="console.log($(this).val())"
                                        onchange="console.log('change is firing')">

                                    @foreach($currencies_en as $currency_en)
                                        <option value="{{$currency_en}}" {{$hotel->currency_en == $currency_en ? 'selected' : ''}}>{{$currency_en}}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"> @error('pound') {{$message}} @enderror</span>

                            </div>







                            <div class="col-lg-4 col-md-4 col-sm-12 mt-3">
                                <label for="inputName" class="control-label">{{ __('register.description') }}</label>
                                <input type="text" class="form-control" id="inputName" name="description" value="{{$hotel->description}}">
                                <span class="text-danger"> @error('description') {{$message}} @enderror</span>

                            </div>



                            <div class="col-lg-4 col-md-4 col-sm-12 mt-3">
                                <label for="inputName" class="control-label">{{ __('register.phone_hotel') }}</label>
                                <input type="number" class="form-control" id="inputName" name="phone_hotel" value="{{$hotel->phone_hotel}}">
                                <span class="text-danger"> @error('phone_hotel') {{$message}} @enderror</span>

                            </div>




                            <div class="col-lg-12 col-md-12 col-sm-12 mt-3">
                                <h5 class="card-title">{{__('hotels.images')}}</h5>

                                <input type="file" name="hotel_photos[]" class="dropify" accept=".jpg, .png, image/jpeg, image/png"
                                       data-height="70" multiple />

                                <span class="text-danger"> @error('hotel_photos') {{$message}} @enderror</span>

                            </div>
                            <br>


                        </div>


                        <div class="d-flex justify-content-center mt-3">
                            <button type="submit" class="btn btn-primary">{{__('register.update_hotel')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!-- Internal Select2 js-->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <!--Internal Fileuploads js-->
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/file-upload.js') }}"></script>
    <!--Internal Fancy uploader js-->
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.ui.widget.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.iframe-transport.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/fancy-uploader.js') }}"></script>
    <!--Internal  Form-elements js-->
    <script src="{{ URL::asset('assets/js/advanced-form-elements.js') }}"></script>
    <script src="{{ URL::asset('assets/js/select2.js') }}"></script>
    <!--Internal Sumoselect js-->
    <script src="{{ URL::asset('assets/plugins/sumoselect/jquery.sumoselect.js') }}"></script>
    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <!--Internal  jquery.maskedinput js -->
    <script src="{{ URL::asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js') }}"></script>
    <!--Internal  spectrum-colorpicker js -->
    <script src="{{ URL::asset('assets/plugins/spectrum-colorpicker/spectrum.js') }}"></script>
    <!-- Internal form-elements js -->
    <script src="{{ URL::asset('assets/js/form-elements.js') }}"></script>



@endsection
