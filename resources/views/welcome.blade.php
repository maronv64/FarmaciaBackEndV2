<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ asset('animate.css/animate.css') }}" rel="stylesheet">

        <title>Laravel</title>

        <!-- Fonts -->
        <!-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet"> -->

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
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
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .boton-primario{
              border-radius: 1rem;
              color: white;
              color: #fff;
              color: #fff;
              background-color: #3490dc;
              border-color: #3490dc;
            }
            .boton-primario:hover{
              background-color: #227dc7;
              border-color: #2176bd;
            }

            .btn {
              display: inline-block;
              font-weight: 400;
              color: #212529;
              text-align: center;
              vertical-align: middle;
              -webkit-user-select: none;
              -moz-user-select: none;
              -ms-user-select: none;
              user-select: none;
              background-color: transparent;
              border: 1px solid transparent;
                  border-top-color: transparent;
                  border-top-style: solid;
                  border-top-width: 1px;
                  border-right-color: transparent;
                  border-right-style: solid;
                  border-right-width: 1px;
                  border-bottom-color: transparent;
                  border-bottom-style: solid;
                  border-bottom-width: 1px;
                  border-left-color: transparent;
                  border-left-style: solid;
                  border-left-width: 1px;
                  border-image-outset: 0;
                  border-image-repeat: stretch;
                  border-image-slice: 100%;
                  border-image-source: none;
                  border-image-width: 1;
              padding: 0.375rem 0.75rem;
                  padding-top: 0.375rem;
                  padding-right: 0.75rem;
                  padding-bottom: 0.375rem;
                  padding-left: 0.75rem;
              font-size: 0.9rem;
              line-height: 1.6;
              border-radius: 0.25rem;
              transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
          }

          .btn-primary {
              color: #fff;
              background-color: #3490dc;
              border-color: #3490dc;
              border-radius: 1rem;
              width: 100px;

          }

        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">

                <div class="content">

                        <div class="title m-b-md">
                            <!-- Farmacia Cruz Azul -->
                            <picture >
                                <img style="text-align:center" width="90%" src="{{asset('/img/fondo3.jpg')}}">
                            </picture>

                        </div>

                        @if (Route::has('login'))
                            <div class="links">
                                @auth
                                    <a   style="color: blue" href="{{ url('/home') }}"> <strong> <h2 class="animated bounce"> Home </h2> </strong> </a>
                                @else
                                    <!-- <a href="{{ route('login') }}" style="color: #000000 !important">Login</a> -->
                                    <a  style="color: blue" href="{{ route('login') }}"><strong> <h2 class="animated bounce"> Login </h2> </strong></a>
                                    {{--
                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}">Register</a>
                                    @endif
                                    --}}
                                @endauth
                            </div>
                        @endif

                    </div>

        </div>
    </body>
</html>
