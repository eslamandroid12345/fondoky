<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg" style="overflow: scroll">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- menu item Dashboard-->
                    <li>

               </li>
                    <!-- menu title -->
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">{{__('hotel_sidebar.home')}} </li>

                    {{--start--}}
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#booking">
                            <div class="pull-left"><i class="fas fa-school"></i><span
                                    class="right-nav-t">{{__('hotel_sidebar.booking')}}</span></div>
                            <div class="pull-right"></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="booking" class="collapse" data-parent="#sidebarnav">

                            <li><a  href="{{route('hotels.reservations')}}">{{__('hotel_sidebar.booking_all')}}</a></li>
                            <li><a  href="{{route('hotels.arrivals')}}">{{__('hotel_sidebar.booking_day')}}</a></li>

                        </ul>


                    </li>
                    {{--end--}}


                         {{--start--}}
                                <li>
                                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#profile">
                                        <div class="pull-left"><i class="fas fa-cogs"></i><span
                                                class="right-nav-t">{{__('hotels.profile')}}</span></div>
                                        <div class="pull-right"></div>
                                        <div class="clearfix"></div>
                                    </a>
                                    <ul id="profile" class="collapse" data-parent="#sidebarnav">

                                        <li><a  href="{{route('hotels.edit')}}">{{__('hotel_sidebar.profile')}}</a></li>

                                    </ul>


                                </li>
                                {{--end--}}


                    {{--start--}}
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#rooms">
                            <div class="pull-left"><i class="fas fa-school"></i><span
                                    class="right-nav-t">{{__('hotel_sidebar.room_department')}}</span></div>
                            <div class="pull-right"></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="rooms" class="collapse" data-parent="#sidebarnav">
                            <li><a  href="{{route('rooms.create')}}">{{__('hotel_sidebar.room_add')}}</a></li>
                            <li><a  href="{{route('rooms.index')}}">{{__('hotel_sidebar.room_type_show')}}</a></li>

                        </ul>


                    </li>
                    {{--end--}}



                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#services">
                            <div class="pull-left"><i class="fa fa-building"></i><span
                                    class="right-nav-text">{{__('hotel_sidebar.hotel_services_show')}}</span></div>
                            <div class="pull-right"></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="services" class="collapse" data-parent="#sidebarnav">
                            <li><a  href="{{route('services.create')}}">{{__('hotel_sidebar.hotel_services')}}</a></li>

                        </ul>
                    </li>



                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#services_room">
                            <div class="pull-left"><i class="fa fa-hand-grab-o"></i><span
                                    class="right-nav-text">{{__('hotel_sidebar.room_services')}}</span></div>
                            <div class="pull-right"></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="services_room" class="collapse" data-parent="#sidebarnav">
                            <li><a  href="{{route('room-services.create')}}"> {{__('hotel_sidebar.room_service_create')}}</a></li>
                            <li><a  href="{{route('hotel-room-services.create')}}"> {{__('hotel_sidebar.service_room_add')}}</a></li>
                            <li><a  href="{{route('room-services.index')}}"> {{__('hotels.room_service_department')}}</a></li>

                        </ul>
                    </li>


                    <!-- sections-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#sections-menu">
                            <div class="pull-left"><i class="fas fa-book-open"></i><span
                                    class="right-nav-text">{{__('hotels.invoices')}}</span></div>
                            <div class="pull-right"></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="sections-menu" class="collapse" data-parent="#sidebarnav">

                            <li><a href="{{route('hotels.month.invoices')}}">{{__('hotels.invoice_monthly')}}</a></li>
                            <li><a href="{{route('hotels.invoices.all')}}">{{__('hotels.invoices_all')}}</a></li>

                        </ul>
                    </li>


                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#rates">
                            <div class="pull-left"><i class="fa fa-star"></i><span
                                        class="right-nav-text">{{__('hotel_sidebar.rates')}}</span></div>
                            <div class="pull-right"></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="rates" class="collapse" data-parent="#sidebarnav">
                            <li><a  href="{{ route('hotels.rates') }}"> {{__('hotel_sidebar.rates_show')}}</a></li>

                        </ul>
                    </li>


                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#comments">
                            <div class="pull-left"><i class="fas fa-user-tie"></i><span
                                        class="right-nav-text">{{__('hotel_sidebar.comments')}}</span></div>
                            <div class="pull-right"></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="comments" class="collapse" data-parent="#sidebarnav">
                            <li><a  href="{{route('hotels.comments')}}"> {{__('hotel_sidebar.comments_show')}}</a></li>

                        </ul>
                    </li>

                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#notifications">
                            <div class="pull-left"><i class="fa fa-bell"></i><span
                                        class="right-nav-text">{{__('sidebar_admin.notifications')}}</span></div>
                            <div class="pull-right"></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="notifications" class="collapse" data-parent="#sidebarnav">
                            <li><a  href="#">{{__('sidebar_admin.notifications_app')}}</a></li>

                        </ul>
                    </li>

                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#problems">
                            <div class="pull-left"><i class="fas fa-book"></i><span
                                        class="right-nav-text">{{__('sidebar_admin.problems')}}</span></div>
                            <div class="pull-right"></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="problems" class="collapse" data-parent="#sidebarnav">
                            <li><a  href="#">{{__('sidebar_admin.problems_app')}}</a></li>

                        </ul>
                    </li>


                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#problems">
                            <div class="pull-left"><i class="fas fa-phone"></i><span
                                        class="right-nav-text">{{ trans('sidebar_admin.contact_us')}}</span></div>
                            <div class="pull-right"></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="problems" class="collapse" data-parent="#sidebarnav">
                            <li><a  href="#">{{ trans('sidebar_admin.contact_us')}}</a></li>

                        </ul>
                    </li>




                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->

