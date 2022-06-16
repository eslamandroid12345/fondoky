<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>My Hotel</title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/v4-shims.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800&family=Mulish:wght@200;300;400;500;600;700;800;900&family=Tajawal:wght@300;400;500;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('web/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('web/style.css')}}">


        <style type="text/css">

            /* img/james-wheeler-0vysUcbfYx4-unsplash.jpg */
            /* img/as_2.webp */
            .header1{

                background-image: url({{asset('img/james-wheeler-0vysUcbfYx4-unsplash.jpg')}});
                height: 70vh;
                background-size: 100% 100%;
                background-repeat: no-repeat;
                margin-top: 74px;
            }

        </style>

        @if(LaravelLocalization::setLocale() == 'en')
          <style>

              .second{

                  direction: ltr;
              }

              .header1{

                  direction: ltr;
              }
              .section1{

                  direction: ltr;

              }

              .section1 ul li img {
                  float: left;
                  padding-right: 10px;
              }

              .section1 ul li img {
                  padding-left: 0px;
                  width: 30px;
              }

              .section1 ul{

                  padding-left: 0px;
              }

              .section2 h2,h4 {

                  direction: ltr;
              }

              .navbar{

                  direction: ltr;

              }


          </style>

        @endif
    </head>




    @include('web.header')




    <!--Start Header-->

    <div class="header1">
        <div class="header1-alpha">
            <div class="container">
                <div class="row header2">

                    <div>

                        <h1>{{__('welcome.h')}}</h1>
                        <p>{{__('welcome.p')}}</p>

                    </div>

                </div>
            </div>
        </div>
    </div>


    <!--End Header-->

    <!--Start Second-->

    <div class="second">
        <div class="container">
            <div class="row">

               <form action="{{url('/')}}" class="form1" method="GET">
                    <div class="col-lg-2 col-12">
                        <input type="text" name="country" placeholder="{{__('welcome.country')}}" value="{{request()->query('country')}}">
                    </div>

                    <div class="col-lg-2 col-12">
                        <input placeholder="{{\Carbon\Carbon::now()->format('Y-m-d')}}" class="textbox-n" type="text" onfocus="(this.type='date')" id="date" name="date_start" value="{{request()->query('date_start')}}">
                    </div>



                    <div class="col-lg-2 col-12">
                        <input placeholder="{{\Carbon\Carbon::now()->addDays(1)->format('Y-m-d')}}" class="textbox-n" type="text" onfocus="(this.type='date')" id="date" name="date_expire" value="{{request()->query('date_expire')}}">
                    </div>

                    <div class="col-lg-5 col-12 child">
                        <input type="number" placeholder="{{__('welcome.adults_max')}}" name="adults_max" value="{{request()->query('adults_max')}}">
                        <input type="number" placeholder="{{__('welcome.child_max')}}" name="child_max" value="{{request()->query('child_max')}}">
                    </div>

                    <div class="col-lg-1 col-12 sub">
                        <input type="submit" value="{{__('welcome.search')}}">
                    </div>


                </form>


            </div>
        </div>
    </div>

    <!--Start section1-->
    <div class="section1">
        <div class="container">
            <section class="_1o0x7p">
                <h2>{{__('welcome.h2')}}</h2>
                <ul class="row">
                    <li class="col-lg-6 col-12">
                        <img src="{{asset('img/check.png')}}" alt="" srcset="">
                        <div>
                            <h3>{{__('welcome.h3_1')}}</h3>
                            <span>{{__('welcome.span_1')}}</span>
                        </div>

                    </li>

                    <li class="col-lg-6 col-12">
                        <img src="{{asset('img/distance.png')}}" alt="" srcset="">
                        <div>
                            <h3>{{__('welcome.h3_2')}}</h3>
                            <span>{{__('welcome.span_2')}}</span>
                        </div>
                    </li>

                    <li class="col-lg-6 col-12">
                        <img src="{{asset('img/hand-sanitizer.png')}}" alt="" srcset="">
                        <div>
                            <h3>{{__('welcome.h3_3')}}</h3>
                            <span{{__('welcome.span_3')}}ا</span>
                        </div>
                    </li>

                    <li class="col-lg-6 col-12">
                        <img src="{{asset('img/washing-hands.png')}}" alt="" srcset="">
                        <div>
                            <h3>{{__('welcome.h3_4')}}</h3>
                            <span>{{__('welcome.span_4')}}</span>
                        </div>
                    </li>


                </ul>
            </section>



        </div>
    </div>

    <!--End section1-->



    <!--Start Section2-->
    <div class="section2">
        <div class="container">

            <h2>{{__('welcome.best_hotels')}}</h2>
            <h4>{{__('welcome.search_hotels')}} </h4>

            <div class="row row-cols-1 row-cols-md-3 g-4">
{{--                // hotels--}}
                @forelse($hotels as $hotel)
{{--                <a href="{{route('hotel.show',$hotel->id)}}">--}}
                <div class="col">
                    <div class="card h-100">
                        @foreach(json_decode($hotel->hotel_photos) as $images)
                                <img src="{{URL::to('/hotels/'.$images)}}" class="card-img-top" alt="...">
                            @endforeach

                        <div class="card-body">

                            <div class="row" style="align-items: flex-end;height: 100%">

                                <div>

                                    <h5 class="card-title">{{lang() == 'ar' ? $hotel->location_ar : $hotel->location_en}}</h5>
                                    <h6>{{lang() == 'ar' ? $hotel->name_ar : $hotel->name_en}}</h6>


                                </div>

                            </div>

                        </div>

                    </div>
                </div>
                </a>
                @empty

                @endforelse



                {{--rooms --}}


                @if(!empty($rooms))
                @forelse($rooms as $room)


                        @php


                            $to =     \Carbon\Carbon::createFromFormat('Y-m-d', request()->query('date_start'));
                            $from =   \Carbon\Carbon::createFromFormat('Y-m-d', request()->query('date_expire'));
                            $diff_in_days = $to->diffInDays($from);

                            $price = $room->calendars[0]->total_calendar == 1 ?  $room->calendars[0]->total_room_price  :  $room->calendars[0]->total_room_price / $diff_in_days;



                        @endphp


                         <a href="{{route('room.reservation',[$room->id,'country' => request()->query('country'), 'date_start' => request()->query('date_start'), 'date_expire' => request()->query('date_expire'), 'adults_max' => request()->query('adults_max'),'child_max' => request()->query('child_max'),'key' => encrypt($price)])}}">

                            <div class="col">
                            <div class="card h-100">


                                @if(!empty($room))
                                    {{--                            // room photos--}}
                                    @foreach(json_decode($room->images) as $image)
                                        <img src="{{URL::to('/rooms/'.$image)}}" class="card-img-top" alt="...">
                                    @endforeach
                                @endif

                                    <div class="card-body">

                                    <div class="row" style="align-items: flex-end;height: 100%">

                                        <div>


                                            <h3 class="card-title">{{$room->hotel->country}} -- {{lang() == 'ar' ? $room->hotel->name_ar : $room->hotel->name_en}}</h3>.
                                            <br>

                                            <h6>{{$room->room_type->room_type}} </h6>
                                            <span>{{$room->adults_max . "بالغ"}} / {{$room->child_max . "طفل"}}</span>

                                        </div>

                                    </div>

                                </div>

                            </div>
                        </div>
                    </a>

                @empty
                    <div class="alert alert-primary py-5 col-md-12 col-sm-12 col-xs-12 col-12">

                        <span>لا يوجد نتائج بفنادقنا مطابقه لعمليه بحثك</span>

                    </div>
                @endforelse
                @endif





                {{--start pagination of rooms and hotels--}}

            </div>
            @if($rooms)
                {{$rooms->appends(['country' => request()->query('country'), 'date_start' => request()->query('date_start'), 'date_expire' => request()->query('date_expire'), 'adults_max' => request()->query('adults_max'),'child_max' => request()->query('child_max')])->links()}}
            @else
                {{$hotels->links()}}

            @endif
        </div>


    </div>


    <!--End Section2-->



     @include('web.footer')


    <script src="{{asset('js/jquery2.js')}}"></script>
    <script src="{{asset('js/jquery.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/show.js')}}"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <script>
        $( function() {
            $( ".datepicker" ).datepicker({ minDate: -20, maxDate: "+1M +10D" });
        } );
    </script>
    </body>
    </html>
