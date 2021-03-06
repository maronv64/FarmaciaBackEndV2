<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Farmacias Cruz Azul</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/sweetalert.min.js') }}" defer></script>
    <script src="{{ asset('js/jquery.dataTables.js') }}" defer></script>
    <script src="{{ asset('js/jQuery.print/jQuery.print.js') }}" defer></script>
    <script src="{{ asset('js/adminSistema.js') }}" defer></script>
    {{--<script src="{{ asset('js/bootstrap-toggle.js') }}" defer></script>--}
    <!-- Fonts -->
    {{--<link rel="dns-prefetch" href="//fonts.gstatic.com">--}}
    {{-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> --}}

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery.dataTables.css') }}" rel="stylesheet">
    {{--<link href="{{ asset('css/bootstrap-toggle.css') }}" rel="stylesheet">--}}
    <link href="{{ asset('css/w3school-toggle.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    {{--<link href="{{ asset('animate.css/animate.css') }}" rel="stylesheet">--}}

    <style media="screen">
      .botones{
        background: #b9007f;
        color: #fff;
      }
      .botones:hover{
        background: #974398;
        color: #fff;
      }
      .barra{
        background:#b9007f;
        color: #fff;
        /* width:  */
      }

      .maxWidth{
          width: 100% !important;
      }

    .fondo1{
        background: #dee8df;
    }
      /* #iframe_producto_img{
        text-align: center;
        position: absolute;
        left: 0;
        right: 0;
        top: 50%;
        transform: translateY(-50%);
        } */

    </style>

</head>
<!--  -->
<body >
    @guest
        <!-- no esta logueado -->
        <input type="hidden" name="" id="nome_token">
    @else
        <input type="hidden" name="" id="nome_token_user" value="{{Auth::user()->nome_token}}">
    @endguest

    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-primary shadow-sm">
            <div class="container">
                <strong><a class="navbar-brand text-white" href="{{ url('/home') }}">
                  <img style="width:25px" src="{{asset('img/logo3.png')}}" alt="">
                    {{ "Farmacias Cruz Azul" }}
                </a></strong>
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
                                <strong><a class="nav-link text-white" href="{{ route('login') }}">{{ __('Login') }}</a></strong>
                            </li>
                            {{--@if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif--}}
                        @else
                            <li class="nav-item dropdown">
                              <a style="color:white" id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                  <strong>{{ Auth::user()->name }}</strong> <span class="caret"></span>
                              </a>

                              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                  <a class="dropdown-item" href="{{ route('logout') }}"
                                     onclick="event.preventDefault();
                                                   document.getElementById('logout-form').submit();">
                                      {{ 'Salir' }}
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
    
    @yield('scripts')
</body>
</html>
