@extends('search.layout')

@section('content')

    <section class="ftco-booking ftco-section ftco-no-pt ftco-no-pb">
        <div class="container-fluid">
            <div class="row no-gutters">
                <div class="col-lg-12">
                    <form action="#" class="booking-form aside-stretch">
                        <div class="row">


                            <div class="col-md d-flex py-md-4">
                                <div class="form-group align-self-stretch d-flex align-items-end">
                                    <div class="wrap align-self-stretch py-3 px-4">
                                        <label for="#">Destination</label>
                                        <div class="form-field">
                                            <div class="select-wrap">
                                                <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                                <input type="text" class="form-control" placeholder="Your destination">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md d-flex py-md-4">
                                <div class="form-group align-self-stretch d-flex align-items-end">
                                    <div class="wrap align-self-stretch py-3 px-4">
                                        <label for="#">Check-in Date</label>
                                        <input type="text" class="form-control checkin_date" placeholder="Check-in date">
                                    </div>
                                </div>
                            </div>


                            <div class="col-md d-flex py-md-4">
                                <div class="form-group align-self-stretch d-flex align-items-end">
                                    <div class="wrap align-self-stretch py-3 px-4">
                                        <label for="#">Check-out Date</label>
                                        <input type="text" class="form-control checkout_date" placeholder="Check-out date">
                                    </div>
                                </div>
                            </div>




                            <div class="col-md d-flex py-md-4">
                                <div class="form-group align-self-stretch d-flex align-items-end">
                                    <div class="wrap align-self-stretch py-3 px-4">
                                        <label for="#">adults</label>
                                        <div class="form-field">
                                            <div class="select-wrap">
                                                <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                                <input type="number" class="form-control" placeholder="adults">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class="col-md d-flex py-md-4">
                                <div class="form-group align-self-stretch d-flex align-items-end">
                                    <div class="wrap align-self-stretch py-3 px-4">
                                        <label for="#">child</label>
                                        <div class="form-field">
                                            <div class="select-wrap">
                                                <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                                <input type="number" class="form-control" placeholder="child">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md d-flex">
                                <div class="form-group d-flex align-self-stretch">
                                    <a href="#" class="btn btn-primary py-5 py-md-3 px-4 align-self-stretch d-block"><span>Check Availability <small>Best Price Guaranteed!</small></span></a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>




    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <span class="subheading">Welcome to Harbor Lights Hotel</span>
                    <h2 class="mb-4">You'll Never Want To Leave</h2>
                </div>
            </div>
            <div class="row d-flex">
                <div class="col-md pr-md-1 d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services py-4 d-block text-center">
                        <div class="d-flex justify-content-center">
                            <div class="icon d-flex align-items-center justify-content-center">
                                <span class="flaticon-reception-bell"></span>
                            </div>
                        </div>
                        <div class="media-body">
                            <h3 class="heading mb-3">Friendly Service</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md px-md-1 d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services active py-4 d-block text-center">
                        <div class="d-flex justify-content-center">
                            <div class="icon d-flex align-items-center justify-content-center">
                                <span class="flaticon-serving-dish"></span>
                            </div>
                        </div>
                        <div class="media-body">
                            <h3 class="heading mb-3">Get Breakfast</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md px-md-1 d-flex align-sel Searchf-stretch ftco-animate">
                    <div class="media block-6 services py-4 d-block text-center">
                        <div class="d-flex justify-content-center">
                            <div class="icon d-flex align-items-center justify-content-center">
                                <span class="flaticon-car"></span>
                            </div>
                        </div>
                        <div class="media-body">
                            <h3 class="heading mb-3">Transfer Services</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md px-md-1 d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services py-4 d-block text-center">
                        <div class="d-flex justify-content-center">
                            <div class="icon d-flex align-items-center justify-content-center">
                                <span class="flaticon-spa"></span>
                            </div>
                        </div>
                        <div class="media-body">
                            <h3 class="heading mb-3">Suits &amp; SPA</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md pl-md-1 d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services py-4 d-block text-center">
                        <div class="d-flex justify-content-center">
                            <div class="icon d-flex align-items-center justify-content-center">
                                <span class="ion-ios-bed"></span>
                            </div>
                        </div>
                        <div class="media-body">
                            <h3 class="heading mb-3">Cozy Rooms</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>





    <section class="ftco-section ftco-no-pb ftco-room">
        <div class="container-fluid px-0">
            <div class="row no-gutters justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <span class="subheading">Harbor Lights Rooms</span>
                    <h2 class="mb-4">Hotel Master's Rooms</h2>
                </div>
            </div>
            <div class="row no-gutters">
                <div class="col-lg-6">
                    <div class="room-wrap d-md-flex ftco-animate">
                        <a href="#" class="img" style="background-image: url({{asset('images/room-6.jpg')}});"></a>
                        <div class="half left-arrow d-flex align-items-center">
                            <div class="text p-4 text-center">
                                <p class="star mb-0"><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span></p>
                                <p class="mb-0"><span class="price mr-1">$120.00</span> <span class="per">per night</span></p>
                                <h3 class="mb-3"><a href="">King Room</a></h3>
                                <p class="pt-1"><a href="" class="btn-custom px-3 py-2 rounded">View Details <span class="icon-long-arrow-right"></span></a></p>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-lg-6">
                    <div class="room-wrap d-md-flex ftco-animate">
                        <a href="#" class="img" style="background-image: url({{asset('images/room-1.jpg')}});"></a>
                        <div class="half left-arrow d-flex align-items-center">
                            <div class="text p-4 text-center">
                                <p class="star mb-0"><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span></p>
                                <p class="mb-0"><span class="price mr-1">$120.00</span> <span class="per">per night</span></p>
                                <h3 class="mb-3"><a href="">Suite Room</a></h3>
                                <p class="pt-1"><a href="" class="btn-custom px-3 py-2 rounded">View Details <span class="icon-long-arrow-right"></span></a></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="room-wrap d-md-flex ftco-animate">
                        <a href="#" class="img order-md-last" style="background-image: url({{asset('images/room-2.jpg')}});"></a>
                        <div class="half right-arrow d-flex align-items-center">
                            <div class="text p-4 text-center">
                                <p class="star mb-0"><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span></p>
                                <p class="mb-0"><span class="price mr-1">$120.00</span> <span class="per">per night</span></p>
                                <h3 class="mb-3"><a href="">Family Room</a></h3>
                                <p class="pt-1"><a href="" class="btn-custom px-3 py-2 rounded">View Details <span class="icon-long-arrow-right"></span></a></p>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-lg-6">
                    <div class="room-wrap d-md-flex ftco-animate">
                        <a href="#" class="img order-md-last" style="background-image: url({{asset('images/room-3.jpg')}});"></a>
                        <div class="half right-arrow d-flex align-items-center">
                            <div class="text p-4 text-center">
                                <p class="star mb-0"><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span></p>
                                <p class="mb-0"><span class="price mr-1">$120.00</span> <span class="per">per night</span></p>
                                <h3 class="mb-3"><a href="">Deluxe Room</a></h3>
                                <p class="pt-1"><a href="" class="btn-custom px-3 py-2 rounded">View Details <span class="icon-long-arrow-right"></span></a></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="room-wrap d-md-flex ftco-animate">
                        <a href="#" class="img" style="background-image: url({{asset('images/room-4.jpg')}});"></a>
                        <div class="half left-arrow d-flex align-items-center">
                            <div class="text p-4 text-center">
                                <p class="star mb-0"><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span></p>
                                <p class="mb-0"><span class="price mr-1">$120.00</span> <span class="per">per night</span></p>
                                <h3 class="mb-3"><a href="">Luxury Room</a></h3>
                                <p class="pt-1"><a href="" class="btn-custom px-3 py-2 rounded">View Details <span class="icon-long-arrow-right"></span></a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="room-wrap d-md-flex ftco-animate">
                        <a href="#" class="img" style="background-image: url({{asset('images/room-5.jpg')}});"></a>
                        <div class="half left-arrow d-flex align-items-center">
                            <div class="text p-4 text-center">
                                <p class="star mb-0"><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span></p>
                                <p class="mb-0"><span class="price mr-1">$120.00</span> <span class="per">per night</span></p>
                                <h3 class="mb-3"><a href="">Superior Room</a></h3>
                                <p class="pt-1"><a href="" class="btn-custom px-3 py-2 rounded">View Details <span class="icon-long-arrow-right"></span></a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>










    <section class="instagram">
        <div class="container-fluid">
            <div class="row no-gutters justify-content-center pb-5 mt-5">
                <div class="col-md-7 text-center heading-section ftco-animate">
                    <span class="subheading">Photos</span>
                    <h2><span>Instagram</span></h2>
                </div>
            </div>
            <div class="row no-gutters">
                <div class="col-sm-12 col-md ftco-animate">
                    <a href="{{asset('images/insta-1.jpg')}}" class="insta-img image-popup" style="background-image: url({{asset('images/insta-1.jpg')}});">
                        <div class="icon d-flex justify-content-center">
                            <span class="icon-instagram align-self-center"></span>
                        </div>
                    </a>
                </div>
                <div class="col-sm-12 col-md ftco-animate">
                    <a href="{{asset('images/insta-2.jpg')}}" class="insta-img image-popup" style="background-image: url({{asset('images/insta-2.jpg')}});">
                        <div class="icon d-flex justify-content-center">
                            <span class="icon-instagram align-self-center"></span>
                        </div>
                    </a>
                </div>
                <div class="col-sm-12 col-md ftco-animate">
                    <a href="{{asset('images/insta-3.jpg')}}" class="insta-img image-popup" style="background-image: url({{asset('images/insta-3.jpg')}});">
                        <div class="icon d-flex justify-content-center">
                            <span class="icon-instagram align-self-center"></span>
                        </div>
                    </a>
                </div>
                <div class="col-sm-12 col-md ftco-animate">
                    <a href="{{asset('images/insta-4.jpg')}}" class="insta-img image-popup" style="background-image: url({{asset('images/insta-4.jpg')}});">
                        <div class="icon d-flex justify-content-center">
                            <span class="icon-instagram align-self-center"></span>
                        </div>
                    </a>
                </div>
                <div class="col-sm-12 col-md ftco-animate">
                    <a href="{{asset('images/insta-5.jpg')}}" class="insta-img image-popup" style="background-image: url({{asset('images/insta-5.jpg')}});">
                        <div class="icon d-flex justify-content-center">
                            <span class="icon-instagram align-self-center"></span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>


@endsection
