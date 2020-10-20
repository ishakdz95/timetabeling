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
    <div class="scrollbar-sidebar ">
        <div class="app-sidebar__inner ">
            <ul class="vertical-nav-menu ">
                @guest
                    <li class="list-group-item active  nav-item" ><a  class="nav-link " href="#">{{ config('app.name', 'TimeTabeling') }}</a></li>
                    <li class=" list-group-item nav-item bg-dark" >
                        <a  class="nav-link text-light" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li  class=" list-group-item nav-item bg-dark">
                            <a class="nav-link text-light" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="app-sidebar__heading text-light">resources</li>
                    <li>
                        <a href="{{ route('home') }}" class="mm-active">
                            <i class="metismenu-icon pe-7s-rocket "></i>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.days.index') }}">
                            <i class="metismenu-icon pe-7s-display2 text-light"></i>
                            <div class="text-light">Days</div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.timeslots.index') }}">
                            <i class="metismenu-icon pe-7s-display2 text-light"></i>
                            <div class="text-light">Timeslots</div>

                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.rooms.index') }}">
                            <i class="metismenu-icon pe-7s-display2 text-light"></i>
                            <div class="text-light">Rooms</div>

                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.years.index') }}">
                            <i class="metismenu-icon pe-7s-display2 text-light"></i>
                            <div class="text-light">Years</div>

                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.sections.index') }}">
                            <i class="metismenu-icon pe-7s-display2 text-light"></i>
                            <div class="text-light">Sections</div>

                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.groups.index') }}">
                            <i class="metismenu-icon pe-7s-display2 text-light"></i>
                            <div class="text-light">Groups</div>

                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.courses.index') }}">
                            <i class="metismenu-icon pe-7s-display2 text-light"></i>
                            <div class="text-light">Courses</div>

                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.professors.index') }}">
                            <i class="metismenu-icon pe-7s-display2 text-light"></i>
                            <div class="text-light"><b>Professors</b></div>

                        </a>
                    </li>
                    <li class="list-group-item nav-item dropdown bg-site">
                        <a id="navbarDropdown" class="dropdown-toggle nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item nav-link" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest

            </ul>
        </div>
    </div>


</div>
