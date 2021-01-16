<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            <li class="nav-item {{ url()->current() == route('admin.dashboard') ? 'open active' : ''  }}">
                <a href="{{ route('admin.dashboard') }}"><i class="la la-home"></i><span
                        class="menu-title" data-i18n="nav.add_on_drag_drop.main">الرئيسية</span>
                </a>
            </li>

            {{-- <li class="nav-item">
                <a href=""><i class="la la-info-circle"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">أساسيات الموقع </span>
                </a>
                <ul class="menu-content">
                    <li class="{{ url()->current() == route('admin.setting') ? 'active' : ''  }}">
                        <a class="menu-item"
                           href="{{route('admin.setting')}}" data-i18n="nav.dash.crypto">
                            الإعدادات
                            <span class="badge badge badge-warning p-0 badge-pill float-right mr-2">
                               <i class="la la-info-circle m-0"></i>
                            </span>
                        </a>
                    </li>
                    <li class="{{ url()->current() == route('admin.abouts') ? 'active' : ''  }}">
                        <a class="menu-item"
                           href="{{route('admin.abouts')}}" data-i18n="nav.dash.crypto">
                            عن الموقع
                            <span class="badge badge badge-dark badge-pill float-right mr-2">
                               {{ 3 }}
                            </span>
                        </a>
                    </li>
                    <li class="{{ url()->current() == route('admin.privacies') ? 'active' : ''  }}">
                        <a class="menu-item"
                           href="{{route('admin.privacies')}}" data-i18n="nav.dash.crypto">
                            الخصوصية و الامان
                            <span class="badge badge badge-success badge-pill float-right mr-2">
                               {{ 6 }}
                            </span>
                        </a>
                    </li>
                    <li class="{{ url()->current() == route('admin.slider_images') ? 'active' : ''  }}">
                        <a class="menu-item"
                           href="{{route('admin.slider_images')}}" data-i18n="nav.dash.crypto">
                            صور الإسلايدر
                            <span class="badge badge badge-info badge-pill float-right mr-2">
                               {{ 2 }}
                            </span>
                        </a>
                    </li>
                </ul>
            </li> --}}

            <li class="nav-item">
                <a href=""><i class="la la-user-secret"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">الحولات </span>
                    {{-- <span class="badge badge badge-success badge-pill float-right mr-2">
                        {{ 67 }}
                    </span> --}}
                </a>
                <ul class="menu-content">
                    <li class="{{ \Request::is('admin/branches') || \Request::is('admin/branches/*') ? 'active' : '' }}">
                        <a class="menu-item" href="#"
                           data-i18n="nav.dash.ecommerce"> الفروع </a>
                    </li>
                    <li class="{{ \Request::is('admin/employees') || \Request::is('admin/employees/*') ? 'active' : '' }}">
                        <a class="menu-item"
                           href="#" data-i18n="nav.dash.crypto">
                            الموظفين </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href=""><i class="la la-user-secret"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">الموظفين </span>
                    {{-- <span class="badge badge badge-success badge-pill float-right mr-2">
                        {{ 67 }}
                    </span> --}}
                </a>
                <ul class="menu-content">
                    <li class="{{ \Request::is('admin/branches') || \Request::is('admin/branches/*') ? 'active' : '' }}">
                        <a class="menu-item" href="#"
                           data-i18n="nav.dash.ecommerce"> الفروع </a>
                    </li>
                    <li class="{{ \Request::is('admin/employees') || \Request::is('admin/employees/*') ? 'active' : '' }}">
                        <a class="menu-item"
                           href="#" data-i18n="nav.dash.crypto">
                            الموظفين </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item {{ \Request::is('admin/users') || \Request::is('admin/users/*') ? 'open active' : ''  }}">
                <a href=""><i class="la la-building-o"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">الاصول </span>
                    {{-- <span class="badge badge badge-success badge-pill float-right mr-2">
                        {{ 67 }}
                    </span> --}}
                </a>
                <ul class="menu-content">
                    <li class="{{ url()->current() == route('admin.users') ? 'active' : ''  }}">
                        <a class="menu-item" href="{{route('admin.users')}}"
                           data-i18n="nav.dash.ecommerce">  الاصول الثابتة </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href=""><i class="la la-user-secret"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">تحويلات مالية </span>
                    {{-- <span class="badge badge badge-success badge-pill float-right mr-2">
                        {{ 67 }}
                    </span> --}}
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{route('branch.transfer.create')}}"

                                          data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                    <li >
                        <a class="menu-item"
                           href="{{route('branch.transfer.create')}}" data-i18n="nav.dash.crypto">
                            اضافة حوالة </a>
                    </li>
                </ul>
            </li>

        </ul>
    </div>
</div>
