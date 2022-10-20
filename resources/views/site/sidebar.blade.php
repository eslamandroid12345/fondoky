<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            <li class="nav-item active"><a href="{{url('/')}}"><i class="la la-mouse-pointer"></i><span
                        class="menu-title" data-i18n="nav.add_on_drag_drop.main">{{__('site.up')}}</span></a>
            </li>


            <li class="nav-item  open ">
                <a href=""><i class="la la-home"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">{{__('site.list')}} </span>
                    <span
                        class="badge badge badge-info badge-pill float-right mr-2">{{$bookers->count()}}</span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="#"
                                          data-i18n="nav.dash.ecommerce">{{__('site.show')}} </a>
                    </li>

                    <li class="active"><a class="menu-item" href="{{url('/')}}"
                                          data-i18n="nav.dash.ecommerce">ا{{__('site.choose')}}</a>
                    </li>

                </ul>
            </li>



            <li class="nav-item"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">{{__('site.languages')}}   </span>
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
