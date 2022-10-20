<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">



            <li class="nav-item active"><a href=""><i class="la la-home"></i><span
                        class="menu-title" data-i18n="nav.add_on_drag_drop.main">{{__('sidebar_admin.home')}}</span></a>
            </li>

            <li class="nav-item open">
                <a href=""><i class="la la-home"></i>
                    <span class="menu-title" data-i18n="nav.dash.main"> {{__('sidebar_admin.hotels')}} </span>
                    <span
                        class="badge badge badge-info badge-pill float-right mr-2">2</span>
                </a>

                <ul class="menu-content">

                    @can('hotels')
                    <li><a class="menu-item" href="{{route('admins.hotel')}}" data-i18n="nav.dash.crypto">
                            {{__('sidebar_admin.hotels_all')}} </a>
                    </li>
                    @endcan

                    @can('rooms')
                    <li><a class="menu-item" href="{{route('admins.rooms')}}" data-i18n="nav.dash.crypto">
                            {{__('sidebar_admin.rooms')}} </a>
                    </li>
                    @endcan

                        @can('reservations')
                        <li><a class="menu-item" href="{{route('booking.all')}}" data-i18n="nav.dash.crypto">
                                {{__('sidebar_admin.bookers')}} </a>
                        </li>
                        @endcan

                </ul>
            </li>


            @can('users')
            <li class="nav-item open">
                <a href=""><i class="la la-home"></i>
                    <span class="menu-title" data-i18n="nav.dash.main"> {{__('sidebar_admin.users')}} </span>
                    <span
                        class="badge badge badge-info badge-pill float-right mr-2">3</span>
                </a>
                <ul class="menu-content">
                    <li class="menu-item"><a class="menu-item" href="{{route('users.all')}}"
                                          data-i18n="nav.dash.ecommerce">{{__('sidebar_admin.users_all')}}  </a>
                    </li>

                </ul>
            </li>
             @endcan



            @can('admins')
            <li class="nav-item open"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">{{__('sidebar_admin.admins')}}</span>
                    <span
                        class="badge badge badge-danger badge-pill float-right mr-2">4</span>
                </a>
                <ul class="menu-content">
                    <li class="menu-item"><a class="menu-item" href="{{route('admins.index')}}"
                                          data-i18n="nav.dash.ecommerce"> {{__('sidebar_admin.admins_all')}} </a>
                    </li>
                    <li><a class="menu-item" href="{{route('admins.register')}}" data-i18n="nav.dash.crypto">
                            {{__('sidebar_admin.admin_create')}} </a>
                    </li>
                </ul>
            </li>
            @endcan




            @can('roles')
            <li class="nav-item open"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">{{__('sidebar_admin.employees_roles')}} </span>
                    <span
                        class="badge badge badge-danger badge-pill float-right mr-2">4</span>
                </a>
                <ul class="menu-content">
                    <li class="menu-item"><a class="menu-item" href="{{route('roles.index')}}"
                                          data-i18n="nav.dash.ecommerce"> {{__('sidebar_admin.roles_all')}} </a>
                    </li>
                    <li><a class="menu-item" href="{{route('roles.create')}}" data-i18n="nav.dash.crypto">
                            {{__('sidebar_admin.roles_create')}} </a>
                    </li>
                </ul>
            </li>

            @endcan




            @can('reports')

            <li class="nav-item"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">{{__('sidebar_admin.report')}} </span>
                    <span
                        class="badge badge badge-danger badge-pill float-right mr-2">3</span>
                </a>
                <ul class="menu-content">
                    <li class="menu-item"><a class="menu-item" href="{{route('admins.commissions')}}"
                                          data-i18n="nav.dash.ecommerce"> {{__('sidebar_admin.report_hotels')}} </a>
                    </li>

                </ul>
            </li>

            @endcan



            <li class="nav-item"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">{{__('sidebar_admin.languages')}}   </span>
                    <span
                        class="badge badge badge-danger badge-pill float-right mr-2">2</span>
                </a>
                <ul class="menu-content">
                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        <li class="nav-item">
                            <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                {{ $properties['native'] }}
                            </a>
                        </li>
                    @endforeach


                </ul>
            </li>


        </ul>
    </div>
</div>
