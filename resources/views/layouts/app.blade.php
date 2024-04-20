@extends('layouts.head')

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ route('campaigns.index') }}">
                    <img src="{{ asset('storage/images/LOGO.png') }}" width="185" height="50" class="d-inline-block align-top" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
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

                            @if ( Auth::user()->role == 'publisher' || Auth::user()->role == 'admin')
                            <li class="nav-item">
                                <a href="{{ route('campaigns.my') }}" class="nav-link">My Campaigns</a>
                            </li>                            
                            <li class="nav-item">
                                <a href="{{ route('campaigns.create') }}" class="nav-link">New Campaign</a>
                            </li>
                            @endif

                            @if (Auth::user()->role == 'user')
                            <li class="nav-item">
                                <a href="{{ route('donations.my') }}" class="nav-link">My Donations</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('campaigns.index') }}" class="nav-link"><span class="badge text-bg-success" style="font-size:0.9rem; color:white; vertical-align:buttom;">Balance : {{ Auth::user()->balance }}$</span></a>
                            </li>
                            @endif

                            
                            @if (Auth::user()->role == 'admin')
                            <li class="nav-item">
                            <a href="{{ route('balance.index') }}" class="nav-link">Manage Users</a>
                            </li>
                            <li class="nav-item">
                            <a href="{{ route('categories.index') }}" class="nav-link">Manage Categories</a>
                            </li>
                            @endif

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
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
