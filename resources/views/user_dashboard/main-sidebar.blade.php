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
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#profile">
                            <div class="pull-left"><i class="fas fa-home"></i><span
                                        class="right-nav-t">{{__('hotel_sidebar.home')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="profile" class="collapse" data-parent="#sidebarnav">

                            <li><a  href="{{url('/')}}">{{__('hotel_sidebar.home')}}</a></li>

                        </ul>


                    </li>
                    {{--end--}}


                    {{--start--}}
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#reservations">
                            <div class="pull-left"><i class="fas fa-book-open"></i><span
                                        class="right-nav-t">{{__('welcome.reservations')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="reservations" class="collapse" data-parent="#sidebarnav">

                            <li><a  href="{{route('home')}}">{{__('welcome.reservations')}}</a></li>

                        </ul>


                    </li>
                    {{--end--}}


                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#rates">
                            <div class="pull-left"><i class="fa fa-star"></i><span
                                        class="right-nav-text">{{__('hotel_sidebar.rates_user')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="rates" class="collapse" data-parent="#sidebarnav">
                            <li><a  href="{{url('/')}}"> {{__('hotel_sidebar.rates_show_user')}}</a></li>

                        </ul>
                    </li>


                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#comments">
                            <div class="pull-left"><i class="fas fa-user-tie"></i><span
                                        class="right-nav-text">{{__('hotel_sidebar.comments_user')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="comments" class="collapse" data-parent="#sidebarnav">
                            <li><a  href="{{url('/')}}"> {{__('hotel_sidebar.comments_show_user')}}</a></li>

                        </ul>
                    </li>



                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->

