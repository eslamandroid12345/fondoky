@extends('layouts.master')
@section('css')
    @section('title')

        تعديل الاستماره الشخصيه

    @stop
@endsection

@section('PageText')
    {{__('hotels.profile')}}
@stop
@section('page-header')
    <!-- breadcrumb -->
    @section('PageTitle')
        {{__('register.update')}}
    @stop
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    @if (session()->has('current_password'))
                        <div class="alert alert-danger">
                            {{session()->get('current_password')}}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                        <form method="POST" action="{{ route('hotels.update',$hotel->id) }}" enctype="multipart/form-data" autocomplete="off">
                            @csrf
                            @method('PUT')

                        <h6 style="font-family: 'Cairo', sans-serif;color: blue">{{__('register.update')}}</h6><br>


                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>{{ __('register.manger') }} <span class="text-danger">*</span></label>
                                    <input  type="text"  class="form-control" name="manger" value="{{$hotel->manger}}">
                                </div>
                            </div>



                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>{{ __('register.name_ar') }} <span class="text-danger">*</span></label>
                                    <input  class="form-control"  type="text" name="name_ar" value="{{$hotel->name_ar}}">
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>{{ __('register.name_en') }} <span class="text-danger">*</span></label>
                                    <input  class="form-control"  type="text" name="name_en" value="{{$hotel->name_en}}">
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>{{ __('register.location_ar') }}</label>
                                    <input  type="text"  class="form-control" name="location_ar" value="{{$hotel->location_ar}}">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>{{ __('register.location_en') }}</label>
                                    <input  type="text"  class="form-control" name="location_en" value="{{$hotel->location_en}}">
                                </div>
                            </div>

                             <div class="col-md-12">
                                <div class="form-group">
                                    <label>{{ __('register.email') }}</label>
                                    <input  type="email"  class="form-control" name="email" value="{{$hotel->email}}">
                                </div>
                            </div>


                           <div class="col-md-12">
                                <div class="form-group">
                                    <label>{{ __('register.current_password') }}</label>
                                    <input  type="password"  class="form-control" name="current_password">
                                </div>
                            </div>

                           <div class="col-md-12">
                                <div class="form-group">
                                    <label>{{ __('register.new_password') }}</label>
                                    <input  type="password"  class="form-control" name="password">
                                </div>
                            </div>


                           <div class="col-md-12">
                                <div class="form-group">
                                    <label>{{ __('register.confirm_password') }}</label>
                                    <input  type="password"  class="form-control" name="confirm_password">
                                </div>
                            </div>




                            <div class="col-md-12">
                                <div class="form-group">
                                    @php
                                        $currencies_ar = ["ريال السعودي ","دولار الامريكي","يورو","درهم الاماراتي","دينار البحريني","جنيه المصري","جنيه البريطاني","دينار الكويتي","ريال العماني","ريال القطري"];

                                    @endphp
                                    <label for="gender">{{ __('register.pound') }} : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="currency_ar">
                                        <option selected disabled>{{ __('register.pound') }}...</option>
                                            @foreach($currencies_ar as $currency)
                                            <option value="{{$currency}}" {{$hotel->currency_ar == $currency ? 'selected' : ''}}>{{$currency}}</option>

                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="form-group">
                                    @php
                                        $currencies_en = ["SAR","USD","EUR","AED","BHD","EGP","GPP","KWD","OMR","QAR"];

                                    @endphp
                                    <label for="gender">{{ __('register.currency_en') }}: <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="currency_en">
                                        <option selected disabled>{{ __('register.currency_en') }}...</option>
                                        @foreach($currencies_en as  $currency_en)
                                            <option value="{{$currency_en}}" {{$hotel->currency_en == $currency_en ? 'selected' : ''}}>{{$currency_en}}</option>

                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>{{ __('register.description') }}</label>
                                    <textarea style="height: 120px"  class="form-control" name="description" >{{$hotel->description}}</textarea>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>{{ __('register.phone_hotel') }}</label>
                                    <input  type="number"  class="form-control" name="phone_hotel" value="{{$hotel->phone_hotel}}">
                                </div>
                            </div>



                        </div>

                        <h6 style="font-family: 'Cairo', sans-serif;color: blue">{{__('hotels.images')}}</h6><br>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="academic_year">{{__('hotels.images')}} : <span class="text-danger">*</span></label>
                                <input type="file" name="hotel_photos[]" multiple />
                            </div>
                        </div>



                        <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">{{__('register.update_hotel')}}</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
