@extends('client.master')
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

    <style>
        .rate {
            float: right;
            height: 46px;
            padding: 0 10px;
        }
        .rate:not(:checked) > input {
            position:absolute;
            top:-9999px;
        }
        .rate:not(:checked) > label {
            float:right;
            width:1em;
            overflow:hidden;
            white-space:nowrap;
            cursor:pointer;
            font-size:30px;
            color:#ccc;
        }
        .rate:not(:checked) > label:before {
            content: '★ ';
        }
        .rate > input:checked ~ label {
            color: #ffc700;
        }
        .rate:not(:checked) > label:hover,
        .rate:not(:checked) > label:hover ~ label {
            color: #deb217;
        }
        .rate > input:checked + label:hover,
        .rate > input:checked + label:hover ~ label,
        .rate > input:checked ~ label:hover,
        .rate > input:checked ~ label:hover ~ label,
        .rate > label:hover ~ input:checked ~ label {
            color: #c59b08;
        }
    </style>
@endsection
@section('title')
    تقييم الفندق
@stop

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">قسم تقييم الفندق</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                تقييم الفندق</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')


    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('success') }}</strong>

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

                 <div class="row">



                     @if(count(json_decode($hotel->hotel_photos)) == 1)
                         @foreach(json_decode($hotel->hotel_photos) as $image)
                             <div class="col-lg-12 col-md-12 col-sm-12 col-12 my-1">

                                 <img src="{{URL::to('/hotels/'.$image)}}" class="d-block w-100" alt="...">
                             </div>
                         @endforeach

                     @elseif(count(json_decode($hotel->hotel_photos)) == 2)

                         @foreach(json_decode($hotel->hotel_photos) as $image)
                             <div class="col-lg-6 col-md-6 col-sm-12 col-12 my-1">

                                 <img src="{{URL::to('/hotels/'.$image)}}" class="d-block w-100" alt="...">
                             </div>
                         @endforeach


                     @elseif(count(json_decode($hotel->hotel_photos)) == 3)

                         @foreach(json_decode($hotel->hotel_photos) as $image)
                             <div class="col-lg-4 col-md-4 col-sm-12 col-12 my-1">

                                 <img src="{{URL::to('/hotels/'.$image)}}" class="d-block w-100" alt="...">
                             </div>
                         @endforeach


                     @else

                         @foreach(json_decode($hotel->hotel_photos) as $image)
                             <div class="col-lg-3 col-md-3 col-sm-12 col-12 my-1">

                                 <img src="{{URL::to('/hotels/'.$image)}}" class="d-block w-100" alt="...">
                             </div>
                         @endforeach

                     @endif

                 </div>

                @if($rates->count() > 0)

                        <div class="mt-4">

                            @for($i = 1 ; $i <= $rates->sum('rates_number') ; $i++)
                                <i class="fa fa-star checked"></i>
                            @endfor

                            @for($j = $rates->sum('rates_number') + 1; $i <= 5 ; $i++)

                                    <i class="fa fa-star"></i>

                            @endfor
                            Rates

                            <div class="mt-2">  @for($i = 1 ; $i <= 5 ; $i++) <i class="fa fa-star checked"></i> @endfor Customer Ratings {{number_format($rates_count,2)}}</div>
                        </div>



                    @else
                    <form class="form" action="{{route('users.rates')}}" method="POST" autocomplete="off">

                        @csrf

                        <div class="row">


                            <div class="col-lg-6 col-md-6 col-sm-12 mt-3">

                                <input type="hidden" value="{{$hotel->id}}" name="hotel_id">


                                <div class="rate">
                                    <input type="radio" id="star5" name="rates_number" value="5" />
                                    <label for="star5" title="5">5 stars</label>
                                    <input type="radio" id="star4" name="rates_number" value="4" />
                                    <label for="star4" title="4">4 stars</label>
                                    <input type="radio" id="star3" name="rates_number" value="3" />
                                    <label for="star3" title="3">3 stars</label>
                                    <input type="radio" id="star2" name="rates_number" value="2" />
                                    <label for="star2" title="2">2 stars</label>
                                    <input type="radio" id="star1" name="rates_number" checked value="1" />
                                    <label for="star1" title="1">1 star</label>
                                </div>

                            </div>

                            <br>

                        </div>


                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary">تقييم الفندق</button>
                            </div>

                    </form>

                    @endif
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
