<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Favicon -->
    <link href="/assets/img/brand/favicon.png" rel="icon" type="image/png">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!-- Icons -->
    <link href="/assets/js/plugins/nucleo/css/nucleo.css" rel="stylesheet" />
    <link href="/assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link rel="stylesheet" href="/assets/select2.min.css">
    <link href="/assets/css/argon-dashboard.css?v=1.1.0" rel="stylesheet" />
    <link rel="stylesheet" href="/assets/css/main.css">

    @yield("css-after")
</head>
<body>


    <nav class="d-block d-lg-none bg-white py-3 text-center" style="position:fixed;bottom:0;width:100%;z-index:1002;font-size:12px">
        <div class="row">
            <a class="col-3" href="/home">
                <i class="ni ni-map-big"></i>
                <br>
                Dashboard
            </a>
            <a href="/topsis" class="col-3">
                <i class="ni ni-air-baloon"></i>

                <br>
                Topsis</a>
            
            <a href="/variable" class="col-3">
                <i class="ni ni-building"></i>
                <br>
                Variable</a>
            <a href="/users" class="col-3">
                <i class="ni ni-badge"></i>
                <br>
                Users</a>
        </div>
    </nav>
        <nav class="navbar navbar-expand-md navbar-dark bg-default shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                   Strategis
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-default" aria-controls="navbar-default" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbar-default">
                    <div class="navbar-collapse-header">
                        <div class="row">
                            <div class="col-6 collapse-brand">
                                    <a class="navbar-brand text-dark" href="{{ url('/') }}">
                                        Strategis
                                    </a>
                            </div>
                            <div class="col-6 collapse-close">
                                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-default" aria-controls="navbar-default" aria-expanded="false" aria-label="Toggle navigation">
                                    <span></span>
                                    <span></span>
                                </button>
                            </div>
                        </div>
                    </div>
                        <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        @guest
                        @else
                        <li>
                            <a href="/home" class="nav-link">
                                <i class="ni ni-map-big"></i>
                                Dashboard</a>
                        </li>
                        <li>
                            <a href="/topsis" class="nav-link">
                                <i class="ni ni-air-baloon"></i>
                                Topsis</a>
                        </li>
                        <li>
                            <a href="/variable" class="nav-link">
                                <i class="ni ni-building"></i>
                                Variable</a>
                        </li>
                        <li>
                            <a href="/users" class="nav-link">
                                <i class="ni ni-badge"></i>
                                Users</a>
                        </li>
                        @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                            @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">
                                        <i class="ni ni-active-40"></i> 
                                        {{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <a id="nav-link" class="nav-link" href="/users" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                   <i class="ni ni-circle-08"></i> {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    <i class="ni ni-curved-next"></i>  {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="container">
            @yield('content')
        </main>
        <br>
        <br>
         <!--   Core   -->
    <script src="/assets/js/plugins/jquery/dist/jquery.min.js"></script>
    <script src="/assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/select2.min.js"></script>
    <script src="/assets/js/argon-dashboard.min.js?v=1.1.0"></script>
    @yield("js-after")

    <script>
      window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove(); 
            });
        }, 3000);
    </script>
</body>
</html>
