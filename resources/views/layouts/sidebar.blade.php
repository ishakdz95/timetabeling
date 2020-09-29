<div class="app-sidebar sidebar-shadow">
    <div class="app-header__logo">
        <div class="logo-src"></div>
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                        data-class="closed-sidebar">
                                    <span class="hamburger-box">
                                        <span class="hamburger-inner"></span>
                                    </span>
                </button>
            </div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
                        <span>
                            <button type="button"
                                    class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                                <span class="btn-icon-wrapper">
                                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                                </span>
                            </button>
                        </span>
    </div>
    <div class="scrollbar-sidebar">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">
                @guest
                    <li class="list-group-item active nav-item" ><a  class="nav-link" href="#">{{ config('app.name', 'TimeTabeling') }}</a></li>
                    <li class="list-group-item nav-item" >
                        <a  class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li  class=" list-group-item nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="app-sidebar__heading">Dashboards</li>
                    <li>
                        <a href="{{ route('home') }}" class="mm-active">
                            <i class="metismenu-icon pe-7s-rocket"></i>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.days.index') }}">
                            <i class="metismenu-icon pe-7s-display2"></i>
                            days
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.timeslots.index') }}">
                            <i class="metismenu-icon pe-7s-display2"></i>
                            Timeslots
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.rooms.index') }}">
                            <i class="metismenu-icon pe-7s-display2"></i>
                            Rooms
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.years.index') }}">
                            <i class="metismenu-icon pe-7s-display2"></i>
                            Years
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.sections.index') }}">
                            <i class="metismenu-icon pe-7s-display2"></i>
                            Sections
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.groups.index') }}">
                            <i class="metismenu-icon pe-7s-display2"></i>
                            Groups
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.courses.index') }}">
                            <i class="metismenu-icon pe-7s-display2"></i>
                            Courses
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.professors.index') }}">
                            <i class="metismenu-icon pe-7s-display2"></i>
                            Professors
                        </a>
                    </li>


                @endguest

            </ul>
        </div>
    </div>


</div>
