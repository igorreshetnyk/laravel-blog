<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'AnsverBlog') }}</title>

    <script src="{{ asset('js/jquery.js') }}" defer></script>
    <script src="{{ asset('js/bootstrap.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    @livewireStyles
</head>

<body>
    <header>
        <div class="container">
            <div class="row justify-content-md-center mynavbar">
                <div class="navbar navbar-expand-lg navbar-light col-md-9">
                    <a class="navbar-brand" href="/"><img src="../images/logoink.png" width="180" height="90"></img></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="#">ABOUT</a></li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">PORTFOLIO</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">CONTACT</a>
                            </li>
                            <li class="nav-item">
                                @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('LOGIN') }}</a>
                            </li>
                            @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('REGISTER') }}</a>
                            </li>
                            @endif
                            @else
                            <li class="dropdown nav-item ">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">

                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" method="POST" action="{{ route('logout') }}"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            @endguest
                            <li class="nav-item dropdown search-form">
                                <i class="fas fa-search" id="searchdropdown" role="button" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false" v-pre></i>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="searchdropdown">
                                    @livewire('search')
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
    </header>

    <div class="container">

        @yield('content')

        <hr>
        <div class="row justify-content-center">
            <a class="copiright link-center" href="">Copiright by Igor Rsh</a>
        </div>
    </div>
    @livewireScripts
</body>

</html>
