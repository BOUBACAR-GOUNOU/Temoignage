<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="Description" content="Devenez une source d’inspiration pour certains dans le monde tout partageant avec ces derniers vos expériences, vos exploits ou vos différents témoignages de vie." />
    <meta name="keywords" content="témoignage,vie, prêt, expérience,exploits,prêt,déception, particuliers, sérieux, partage,monde,découverte,source,inspiration">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Témoignage') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
     <!-- captcha-->
     <script src="https://www.google.com/recaptcha/api.js" async defer></script>
     

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/temoignage.jpeg') }}">
    <link href="//fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/flashy.css') }}" rel="stylesheet">
    <link href="{{ asset('css/css.css') }}" rel="stylesheet">
</head>
<body class="police">
    <div id="app">
     {{--    <div class="row justify-content-center">
            <div class="col-md-8"> --}}
                <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
                    <div class="container">
                        <a class="navbar-brand " href="{{ route('ad.index') }}">
                            <img src="{{URL::asset('img/temoignage.jpeg') }}" alt="profile Pic" height="50" width="120">
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <!-- Left Side Of Navbar -->
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item">
                                    <a href="{{ route('ad.create') }}" class="nav-link">Ecris un témoignage</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('home') }}" class="nav-link">Mes témoignages</a>
                                </li>
                            </ul>

                            <!-- Right Side Of Navbar -->
                            <ul class="navbar-nav ml-auto">
                                <!-- Authentication Links -->
                                @guest
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Se connecter') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('S\'enregistrer') }}</a>
                                    </li>
                                @else
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ Auth::user()->name }} <span class="caret"></span>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                                {{ __('Se déconnecter') }}
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

                <script src="//code.jquery.com/jquery.js"></script>
                <script src="{{ asset('js/flashy.js') }}"></script>
                @include('flashy::message')
            </main>
          {{--   </div>
        </div> --}}
    </div>
    @yield('extra-js')

    <!-- FOOTER -->
<footer>

    <div class="card mt-4">
        <div class="card-body ">
          <blockquote class="blockquote mb-0">
            <span class="blockquote-footer text-center">Termes et conditions | Poltiique de confidentialité. &nbsp;&nbsp; <br>Copyright ©2020 Témoignage de vie.</span>
          </blockquote>
        </div>
  </div>
</footer>
    <!-- / FOOTER -->

@yield('scripts')
</body>
</html>
