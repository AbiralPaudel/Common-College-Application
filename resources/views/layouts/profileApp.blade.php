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
    @yield('scripts')

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                @guest
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="/images/logo.jpg" alt="Common College App">
                        <!-- {{ config('app.name', 'Laravel') }} -->
                    </a>
                @else
                    <a class="navbar-brand" href="{{ url('/profile/create') }}">
                        <img src="/images/logo.jpg" alt="Common College Apps">
                        <!-- {{ config('app.name', 'Laravel') }} -->
                    </a>
                @endguest
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    @auth
                    <ul class="navbar-nav mr-auto font-weight-bold">
                        <a href="{{ url('/profile/create') }}" class="nav-link">Dashboard</a>
                    </ul>
                    <ul class="navbar-nav mr-auto font-weight-bold">
                        <a href="/college/my/{{Auth::user()->id}}" class="nav-link">My Colleges</a>
                    </ul>
                    <ul class="navbar-nav mr-auto font-weight-bold">
                        <a href="{{route('profile.edit', Auth::user()->id)}}" class="nav-link">My Info</a>
                    </ul>
                    <ul class="navbar-nav mr-auto font-weight-bold">
                        <a href="/available/colleges" class="nav-link">Available Colleges</a>
                    </ul>
                    <ul class="navbar-nav mr-auto font-weight-bold">
                        <a href="/search" class="nav-link">College Search</a>
                    </ul>
                    @endauth

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <!-- <a  href="/admin/login" class="nav-link text-gray-700 font-weight-bold"> Admin Login </a>
                        <a href="/admin/register" class="nav-link text-gray-700 font-weight-bold"> Admin Register </a> -->
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
