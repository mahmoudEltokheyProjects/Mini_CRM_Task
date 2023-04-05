<!-- main-sidebar -->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar sidebar-scroll">
        <div class="main-sidebar-header active">
            <a class="desktop-logo logo-light active" href="{{ url('/' . $page='index') }}"><img src="{{URL::asset('assets/img/brand/logo.png')}}" class="main-logo" alt="logo"></a>
            <a class="desktop-logo logo-dark active" href="{{ url('/' . $page='index') }}"><img src="{{URL::asset('assets/img/brand/logo-white.png')}}" class="main-logo dark-theme" alt="logo"></a>
            <a class="logo-icon mobile-logo icon-light active" href="{{ url('/' . $page='index') }}"><img src="{{URL::asset('assets/img/brand/favicon.png')}}" class="logo-icon" alt="logo"></a>
            <a class="logo-icon mobile-logo icon-dark active" href="{{ url('/' . $page='index') }}"><img src="{{URL::asset('assets/img/brand/favicon-white.png')}}" class="logo-icon dark-theme" alt="logo"></a>
        </div>
        <div class="main-sidemenu">
            <div class="app-sidebar__user clearfix">
                <div class="dropdown user-pro-body">
                    <div class="">
                        <img alt="user-img" class="avatar avatar-xl brround" src="{{URL::asset('assets/img/faces/user.jpg')}}"><span class="avatar-status profile-status bg-green"></span>
                    </div>
                    <div class="user-info">
                        <h4 class="font-weight-semibold mt-3 mb-0">{{ Auth::user()->name }}</h4>
                        <span class="mb-0 text-muted">{{ Auth::user()->email }}</span>
                    </div>
                </div>
            </div>
            <ul class="side-menu">
                    <li class="side-item side-item-category">
                        {{ __('Frontend/frontend.sidebar.sidebar_title') }}
                    </li>
                    <li class="slide">
                        {{-- ++++++++++++++ الرئيسية +++++++++++++++++ --}}
                        <a class="side-menu__item" href="{{ url('/' . $page='home') }}">
                            <i class="fa fa-home fa-lg ml-2" style="color:#5b6e88;"></i>
                            <span class="side-menu__label">
                                {{-- Get From "lang/ar/Frontend/" or "lang/en/Frontend/" --}}
                                {{ __('Frontend/frontend.sidebar.sidebar_sec1') }}
                            </span>
                        </a>
                    </li>
                    {{-- ++++++++++++++++++++++++++++ الشركات ++++++++++++++++++++++++++++ --}}
                    <li class="slide">
                        {{-- ////////// عرض الشركات ////////// --}}
                        <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page='#') }}">
                            <i class="fa fa-file fa-lg ml-2" style="color:#5b6e88;"></i>
                            <span class="side-menu__label">
                                {{ __('Frontend/frontend.sidebar.sidebar_company') }}
                            </span>
                            <i class="angle fe fe-chevron-down"></i>
                        </a>
                        <ul class="slide-menu">
                            {{-- ////////// عرض الشركات ////////// --}}
                            <li>
                                <a class="slide-item" href="{{ url('/' . $page='companies') }}">
                                 {{-- Get From "lang/ar/Frontend/" or "lang/en/Frontend/" --}}
                                 {{ __('Frontend/frontend.sidebar.sidebar_sec2_Companies.companies_list') }}
                                </a>
                            </li>
                        </ul>
                    </li>
                    {{-- ++++++++++++++++++++++++++++ الموظفين ++++++++++++++++++++++++++++ --}}
                    <li class="slide">
                        {{-- //////////  الموظفين ////////// --}}
                        <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page='#') }}">
                            <i class="fa fa-file fa-lg ml-2" style="color:#5b6e88;"></i>
                            <span class="side-menu__label">
                                {{ __('Frontend/frontend.sidebar.sidebar_employee') }}
                            </span>
                            <i class="angle fe fe-chevron-down"></i>
                        </a>
                        <ul class="slide-menu">
                            {{-- ////////// عرض الموظفين ////////// --}}
                            <li>
                                <a class="slide-item" href="{{ url('/' . $page='employees') }}">
                                 {{-- Get From "lang/ar/Frontend/" or "lang/en/Frontend/" --}}
                                 {{ __('Frontend/frontend.sidebar.sidebar_sec2_Employees.employees_list') }}
                                </a>
                            </li>
                        </ul>
                    </li>
            </ul>
        </div>
    </aside>
<!-- main-sidebar -->
