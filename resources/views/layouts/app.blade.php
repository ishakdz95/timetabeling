<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-darkness">
    <nav class="sidenav navbar-dark bg-dark" >
        <ul >

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
                <li class="list-group-item active nav-item" ><a  class="nav-link" href="{{ route('admin.timetabelings.index') }}">{{ config('app.name', 'TimeTabeling') }}</a></li>
                            <li class="list-group-item nav-item">
                                 <a class="nav-link" href="{{ route('home') }}">
                                     Home
                                  </a>
                             </li>
                             <li class="list-group-item nav-item">
                                 <a class="nav-link" href="{{ route('admin.years.index') }}">
                                     Years
                                </a>
                             </li>
                             <li class="list-group-item nav-item" >
                                <a  class="nav-link" href="{{ route('admin.timeslots.index') }}">
                                    TimeSlots
                                </a>
                             </li>
                            <li class="list-group-item nav-item" >
                               <a  class="nav-link" href="{{ route('admin.days.index') }}">
                                   Days
                                </a>
                             </li>
                            <li class="list-group-item nav-item">
                                <a class="nav-link" href="{{ route('admin.professors.index') }}">
                                    Professors
                                </a>
                            </li>
                            <li class="list-group-item nav-item" >
                                <a  class="nav-link" href="{{ route('admin.rooms.index') }}">
                                    Rooms
                                </a>
                            </li>
                            <li class="list-group-item nav-item" >
                             <a  class="nav-link" href="{{ route('admin.courses.index') }}">
                                 Courses
                             </a>
                            </li>
                            <li class="list-group-item nav-item" >
                              <a  class="nav-link" href="{{ route('admin.groups.index') }}">
                                  Groups
                              </a>
                </li>
                <li class="list-group-item nav-item dropdown">
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
            </nav>
    <div >
        <main class=" py-4" >
            @yield('content')
        </main>
    </div>

</body>
</html>
