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
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">{{__('sidebar_admin.hotels')}}</li>

                    {{--start--}}
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#booking">
                            <div class="pull-left"><i class="fas fa-school"></i><span
                                    class="right-nav-t">{{__('sidebar_admin.hotels')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="booking" class="collapse" data-parent="#sidebarnav">

                            @can('hotels')
                            <li><a  href="{{route('admins.hotel.all')}}">{{__('sidebar_admin.hotels_all')}}</a></li>
                            @endcan

                            @can('reservations')
                            <li><a  href="{{route('booking.all')}}">{{__('sidebar_admin.bookers')}}</a></li>
                                @endcan


                        </ul>


                    </li>
                    {{--end--}}





                         {{--start--}}
                            @can('users')
                                <li>
                                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#profile">
                                        <div class="pull-left"><i class="fas fa-school"></i><span
                                                class="right-nav-t">{{__('sidebar_admin.users')}}</span></div>
                                        <div class="pull-right"><i class="ti-plus"></i></div>
                                        <div class="clearfix"></div>
                                    </a>
                                    <ul id="profile" class="collapse" data-parent="#sidebarnav">

                                        <li><a  href="{{route('users.all')}}">{{__('sidebar_admin.users_all')}}</a></li>

                                    </ul>


                                </li>
                            @endcan
                                {{--end--}}


                    {{--start--}}
                    @can('admins')
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#rooms">
                            <div class="pull-left"><i class="fas fa-school"></i><span
                                    class="right-nav-t">{{__('sidebar_admin.admins')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="rooms" class="collapse" data-parent="#sidebarnav">
                            <li><a  href="{{route('admins.index')}}">{{__('sidebar_admin.admins_all')}}</a></li>
                            <li><a  href="{{route('admins.register')}}">{{__('sidebar_admin.admin_create')}}</a></li>

                        </ul>


                    </li>
                    @endcan
                    {{--end--}}



                    @can('roles')
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#services">
                            <div class="pull-left"><i class="fa fa-building"></i><span
                                    class="right-nav-text">{{__('sidebar_admin.employees_roles')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="services" class="collapse" data-parent="#sidebarnav">
                            <li><a  href="{{route('roles.index')}}">{{__('sidebar_admin.roles_all')}}</a></li>
                            <li><a  href="{{route('roles.create')}}">{{__('sidebar_admin.roles_create')}}</a></li>

                        </ul>
                    </li>
                    @endcan


                    @can('reports')
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#services_room">
                            <div class="pull-left"><i class="fa fa-building"></i><span
                                    class="right-nav-text">{{__('sidebar_admin.report')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="services_room" class="collapse" data-parent="#sidebarnav">
                            <li><a  href="{{route('admins.commissions')}}"> {{__('sidebar_admin.report_hotels')}}</a></li>

                        </ul>
                    </li>
                    @endcan


                    <!-- sections-->



                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->

