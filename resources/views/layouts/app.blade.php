<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Company Title</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    <!-- <link href="{{ asset('css/customStyle.css') }}" rel="stylesheet"> -->
    <!-- <link href="{{ asset('vendor/bootstrap/css/bootstrap.css') }}" rel="stylesheet"> -->
    <link href="{{ asset('css/customStyle.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-theme.css') }}">
    
    <style>
                 html{
                
                background: url(/img/background.jpg) no-repeat center center fixed; 
                -webkit-background-size: cover;
                  -moz-background-size: cover;
                  -o-background-size: cover;
                  background-size: cover;
            }

            body {
                background-color: transparent;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            body::before
            {
              content: "";
              display: block;
              position: fixed;
              z-index: -1;
              width: 100%;
              height: 100%;
              background:white;
              opacity: .5;
            }
        /* body {
            background-color: transparent;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            } */

        .navbar-default .navbar-nav>li>a, .navbar-default .navbar-text {
            font-weight: 500;
            color: #2b2828;
        }

        .navbar-default .navbar-brand {
            color: #4b5861;
            font-weight: 700;
        }

        .panel-default>.panel-heading {
            color: #4b5861;
            background-color: #f1f1f2;
            border-color: #d3e0e9;
            font-weight: 900;
            font-size: 20px;
        }
        .navbar {
            position: fixed;
            width: 100%;
            }
        .body-container{
            padding-top:60px;
        }
        .row{
             background-color: none;
            margin-left: 0px; 
            margin-right: 0px;     
        }
    </style>
</head>
<body>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
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
                        Company Name
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                        @else
                            <li class="dropdown">
                                 <a href="{{ url('/home') }}">Home</a>
                            </li>
                            <!-- <li class="dropdown">
                                 <a href="{{ url('/employee') }}">Employees</a>
                            </li> -->
                            
                            
                            
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->firstname }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                     <a href="{{ url('/profile') }}">Profile</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                    <li>
                                     <a href="{{ url('/register') }}">Register User</a>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        <div class="body-container">
        @yield('content')
        </div>
    </div>
    <div class="body-container">
        @yield('content2')
        </div>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAlMpAQod96LGz3CwQCZnP8OwK2n0r-gsI"></script>
    <script src="{{ asset('js/Chart.js') }}" defer></script>
</body>
</html>
