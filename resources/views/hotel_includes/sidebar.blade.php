<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">



            <li class="nav-item active"><a href=""><span
                        class="menu-title" data-i18n="nav.add_on_drag_drop.main">{{__('hotel_sidebar.home')}} </span></a>
            </li>




            <li class="nav-item  open ">
                <a href=""><i class="la la-home"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">{{__('hotel_sidebar.booking')}}</span>
                    <span
                        class="badge badge badge-info badge-pill float-right mr-2">5</span>
                </a>
                <ul class="menu-content">

                    <li><a class="menu-item" href="{{route('hotels.reservations')}}"
                                          data-i18n="nav.dash.ecommerce"> {{__('hotel_sidebar.booking_all')}}  </a>
                    </li>




                    <li><a class="menu-item" href="{{route('hotels.room.type.create')}}" data-i18n="nav.dash.crypto">
                            {{__('hotel_sidebar.room_type_add')}}</a>
                    </li>


                    <li><a class="menu-item" href="{{route('rooms.create')}}" data-i18n="nav.dash.crypto">
                            {{__('hotel_sidebar.room_add')}}</a>
                    </li>



                     <li><a class="menu-item" href="{{route('hotels.room.type.index')}}" data-i18n="nav.dash.crypto">
                             {{__('hotel_sidebar.room_type_show')}}</a>
                    </li>

                    <li><a class="menu-item" href="{{route('rooms.index')}}" data-i18n="nav.dash.crypto">
                            {{__('hotel_sidebar.room_show')}} </a>
                    </li>


                </ul>
            </li>



            <li class="nav-item  open ">
                <a href=""><i class="la la-home"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">{{__('hotel_sidebar.hotel_services_show')}} </span>
                    <span
                        class="badge badge badge-info badge-pill float-right mr-2">1</span>
                </a>
                <ul class="menu-content">
                    <li class="menu-item"><a class="menu-item" href="{{route('services.create')}}"
                                          data-i18n="nav.dash.crypto"> {{__('hotel_sidebar.hotel_services')}} </a>
                    </li>



                </ul>
            </li>


            <li class="nav-item  open ">
                <a href=""><i class="la la-home"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">الفواتير </span>
                    <span
                        class="badge badge badge-info badge-pill float-right mr-2">1</span>
                </a>
                <ul class="menu-content">
                    <li class="menu-item"><a class="menu-item" href="{{route('hotels.month.invoices')}}"
                                          data-i18n="nav.dash.crypto"> الفاتوره الشهريه </a>
                    </li>



                </ul>
            </li>



            <li class="nav-item  open ">
                <a href=""><i class="la la-home"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">{{__('hotel_sidebar.room_calendar')}}</span>
                    <span
                        class="badge badge badge-info badge-pill float-right mr-2">1</span>
                </a>
                <ul class="menu-content">



                    <li><a class="menu-item" href="{{route('calendars.create')}}" data-i18n="nav.dash.crypto">
                            {{__('hotel_sidebar.calendar_add')}}</a>
                    </li>


                </ul>
            </li>





            <li class="nav-item"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">{{__('hotel_sidebar.languages')}}</span>
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
