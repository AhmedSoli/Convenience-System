<!DOCTYPE html>
<html lang="en">
<head>
    <title>Getränke System</title>
    <meta charset=utf-8>
    <meta name=viewport content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/9.0.0/bootstrap-slider.js"></script>
    <script src="/js/patternLock.js"></script>
    <script src="/js/awesomplete.js"></script>
    <script src="/js/sweetalert2.js"></script>


    <script src="/js/app.js"></script>
    <link rel="stylesheet" type="text/css" href="/css/app.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/9.0.0/css/bootstrap-slider.css">
    <link rel="stylesheet" type="text/css" href="/css/patternLock.css">
    <link rel="stylesheet" type="text/css" href="/css/awesomplete.css">
    <link rel="stylesheet" type="text/css" href="/css/sweetalert2.css">

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>

</head>
<body id="app-layout">
    <nav class="navbar  navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    Admin Panel
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    @if (!Auth::guest())
                    <li><a href="/products">Products</a></li>
                    <li><a href="/payments">Payments</a></li>
                    <li><a href="/transfer">Transfer</a>
                        @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        <li><a href="{{ url('/app') }}">App</a></li>

                        @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Admin Login</a></li>

                        @else
                        <li><a href="/register">Register new</a></li>

                        <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>

                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')

        <!-- JavaScripts -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
    </body>
    </html>
