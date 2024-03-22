<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/welcome') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <!-- Additional Links -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('welcome') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">Services</a>
                        </li>
                        <li class="nav-item">
                            @if(auth()->check() && auth()->user()->hasRole('user'))
                            <a class="nav-link" href="{{ route('user.decisions.create') }}">Recycle Form</a>
                            @endif

                        </li>
                        <li class="nav-item">
                            @if(auth()->check() && auth()->user()->hasRole('admin'))
                            <a class="nav-link" href="{{ route('user.decisions.create') }}">Recycle Form</a>
                            @endif

                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">Our Goal</a>
                        </li>


                        <!-- need to add a guest view for car parts as guests still need to view the shop, add the web.php route too -->
                        @if(auth()->check() && auth()->user()->hasRole('user'))
                        <li class="nav-item"> 
                            <a class="nav-link" href="{{ route('user.carparts.index') }}">Shop</a>
                        </li>
                        @endif

            
                        @if(auth()->check() && auth()->user()->hasRole('admin'))
                        <li class="nav-item"> 
                            <a class="nav-link" href="{{ route('admin.carparts.index') }}">Shop</a>
                        </li>
                        @endif

<!-- want the admin to have own view of shop, this causes two shop navs to appear, as both are shown the unauth and auth but i need to index for car parts show have different endpoints for user and admin -->
                        <li class="nav-item">
                            @if(auth()->check() && auth()->user()->hasRole('admin'))
                            <a class="nav-link" href="{{ route('admin.decisions.decided') }}">Forms for Recycling</a>
                            @endif
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto align-items-center">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.basket.index') }}">
                                <i class="bi bi-basket2-fill fs-5 text-dark"></i>
                                Basket
                            </a>

                        </li>
                        <li class="nav-item d-flex justify-content-center ">
                            <span class="nav-link fs-5 text-success">({{ Auth::user()->points }})</span>
                        </li>

                        <!-- User Dropdown -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <!-- Link to Past Forms -->
                                <a class="dropdown-item" href="{{ route('user.decisions.past_forms') }}">
                                    Past Forms
                                </a>
                                <div class="dropdown-divider">
                                </div>

                                <!-- Logout Link -->
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <!-- Logout Form -->
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