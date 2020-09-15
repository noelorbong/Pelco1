<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Company</title>

    <link rel="stylesheet" href="{{ asset('css/bootstrap-theme.css') }}">
        <!-- Styles -->
        <style>
            html{
                
                background: url(img/background.jpg) no-repeat center center fixed; 
                  -webkit-background-size: cover;
                  -moz-background-size: cover;
                  -o-background-size: cover;
                  background-size: cover;
            }

            body {
                
                
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

             body::before
            {
              content: "";
              display: block;
              position: absolute;
              z-index: -1;
              width: 100%;
              height: 100%;
              background:white;
              opacity: .5;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
                width:100%;
            }

            .title {
                font-size: 5vw;
                /*color: #ffffff;*/
                font-weight: 500;
                color: #636b6f;
                -webkit-text-stroke: 2px #ffffff;
                /* background-color: #000; */
            }

             .title::before
            {
              content: "";
              display: block;
              position: absolute;
              z-index: -1;
              width: 100%;
              height: 6.5vw;
              background:#494d4e;
              opacity: .6;
            }

            .links > a {
                color: #656565;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }


                        /* latin-ext */
            @font-face {
            font-family: 'Raleway';
            font-style: normal;
            font-weight: 100;
            src: local('Raleway Thin'), local('Raleway-Thin'), url(fonts/1Ptsg8zYS_SKggPNwE44Q4FqPfE.woff2) format('woff2');
            unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
            }
            /* latin */
            @font-face {
            font-family: 'Raleway';
            font-style: normal;
            font-weight: 100;
            src: local('Raleway Thin'), local('Raleway-Thin'), url(fonts/1Ptsg8zYS_SKggPNwE44TYFq.woff2) format('woff2');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
            }
            /* latin-ext */
            @font-face {
            font-family: 'Raleway';
            font-style: normal;
            font-weight: 600;
            src: local('Raleway SemiBold'), local('Raleway-SemiBold'), url(fonts/1Ptrg8zYS_SKggPNwPIsWqhPAMif.woff2) format('woff2');
            unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
            }
            /* latin */
            @font-face {
            font-family: 'Raleway';
            font-style: normal;
            font-weight: 600;
            src: local('Raleway SemiBold'), local('Raleway-SemiBold'), url(fonts/1Ptrg8zYS_SKggPNwPIsWqZPAA.woff2) format('woff2');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>       
         
                    @else               
                        <!-- <a href="{{ url('/register') }}">Register</a>        -->
                        
                        <a href="{{ url('/login') }}">Login</a>
                    @endif
                </div>
            @endif

            <div class="content ">
                
                <div class="title m-b-md">
                <!-- <img src="http://refc.com.ph/wp-content/uploads/2017/01/xPELCO-I-new-logo-300x300.jpg.pagespeed.ic.CgYT9A2gYH.jpg" alt="PELCO1"> -->
                    Company Name
                   
                </div>
            </div>
        </div>
    </body>
</html>
