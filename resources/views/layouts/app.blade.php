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
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('asset/css/vendor/bootstrap.min.css')}}">
    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="{{asset('asset/css/vendor/bicon.min.css')}}">
    <!-- Flat Icon CSS -->
    <link rel="stylesheet" href="{{asset('asset/css/vendor/flaticon.css')}}">
    <!-- audio & video player CSS -->
    <link rel="stylesheet" href="{{asset('asset/css/plugins/plyr.css')}}">
    <!-- Slick CSS -->
    <link rel="stylesheet" href="{{asset('asset/css/plugins/slick.min.css')}}">
    <!-- nice-select CSS -->
    <link rel="stylesheet" href="{{asset('asset/css/plugins/nice-select.css')}}">
    <!-- perfect scrollbar css -->
    <link rel="stylesheet" href="{{asset('asset/css/plugins/perfect-scrollbar.css')}}">
    <!-- light gallery css -->
    <link rel="stylesheet" href="{{asset('asset/css/plugins/lightgallery.min.css')}}">
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{asset('asset/css/style.css')}}">

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/newpost') }}">
                    New Post 
                </a>
                @auth
                    <a class="navbar-brand" href="{{ route('savedposts', Auth::user()->id) }}">
                        | Saved Posts 
                    </a>
                @endauth
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
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
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
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
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    @yield('share')
    

<footer>
    <!-- Modernizer JS -->
    <script src="asset/js/modernizr-3.6.0.min.js"></script>
    <!-- jQuery JS -->
    <script src="asset/js/vendor/jquery-3.3.1.min.js"></script>
    <!-- Popper JS -->
    <script src="asset/js/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="asset/js/vendor/bootstrap.min.js"></script>
    <!-- Slick Slider JS -->
    <script src="asset/js/plugins/slick.min.js"></script>
    <!-- nice select JS -->
    <script src="asset/js/plugins/nice-select.min.js"></script>
    <!-- audio video player JS -->
    <script src="asset/js/plugins/plyr.min.js"></script>
    <!-- perfect scrollbar js -->
    <script src="/asset/js/plugins/perfect-scrollbar.min.js"></script>
    <!-- light gallery js -->
    <script src="/asset/js/plugins/lightgallery-all.min.js"></script>
    <!-- image loaded js -->
    <script src="/asset/js/plugins/imagesloaded.pkgd.min.js"></script>
    <!-- isotope filter js -->
    <script src="/asset/js/plugins/isotope.pkgd.min.js"></script>
    <!-- Main JS -->
    <script src="/asset/js/main.js"></script>
</footer>
</body>
</html>
