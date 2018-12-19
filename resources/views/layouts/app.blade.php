<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="https://unpkg.com/ionicons@4.4.2/dist/ionicons.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
    <!-- Styles -->
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    @yield('css')
</head>
<body>
    <div class='main-container'>
        <header class="main-header">
            <nav class="navbar navbar-dark main-navbar navbar-expand-md mb-0">
                <a class="navbar-brand" href="{{ route('home') }}">
                <img src="/img/logo.png" alt="" class="logo">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Contenido que en mobile se colapsa. -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="links-utiles">
                <span class="links-extra">
                    <ul class="links-extra-ul">
                    <li>
                        <a href="#">Home</a>
                    </li>
                    <li>
                        <p>|</p>
                    </li>
                    <li>
                        <a href="#">Servicio Tecnico</a>
                    </li>
                    <li>
                        <p>|</p>
                    </li>
                    <li>
                        <a href="#">Monitoreo</a>
                    </li>
                    </ul>
                </span>
                <span class="llamenos">
                    <p>Llamenos +5411 4209-3622</p>
                </span>
                <span class="header-rrss">
                    <ul>
                    <li>
                        <a href="https://www.linkedin.com/"><ion-icon name="logo-linkedin" size="large"></ion-icon></a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com/helsecurity/"><ion-icon name="logo-instagram" size="large"></ion-icon></a>
                    </li>
                    <li>
                        <a href="https://www.facebook.com/HEL.Seguridad/"><ion-icon name="logo-facebook" size="large"></ion-icon></a>
                    </li>
                    </ul>
                </span>
            </div>
                <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown nav-cuenta">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Cuenta
                    </a>
                    @if(Auth::check())
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="mi-cuenta.php">Mi Cuenta</a>
                            <a class="dropdown-item" href="{{ url('/logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Logout
                            </a>

                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    @else
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('login') }}">Login</a>
                            <a class="dropdown-item" href="{{ route('registro') }}">Registro</a>
                        </div>
                    @endif
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Alarmas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Cámaras</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Anti incendios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Accesorios</a>
                </li>
            </ul>
                </div>
            </nav>
        </header>
        @yield('content')

        <footer class="main-footer">
            <div class="logo-footer-container">
                <img src="/img/logo.png" alt="" class="logo-footer-img">
            </div>
            <div class="informacion-contacto">
                <ul>
                <li>
                    <p class="footer-info">Boquerón 2486 - Valentín Alsina | Lanús </p>
                </li>
                <li>
                    <p class="footer-info">Tel +5411 4209-3622 </p>
                </li>
                <li>
                    <p class="footer-info">info@helsecurity.com</p>
                </li>
                </ul>
            </div>
            <div class="footer-rrss-container">
                <ul class="footer-rrss-list">
                <li>
                    <ion-icon name="logo-linkedin" size="large" class="rrss-verde"></ion-icon>
                </li>
                <li>
                    <ion-icon name="logo-instagram" size="large" class="rrss-verde"></ion-icon>
                </li>
                <li>
                    <ion-icon name="logo-facebook" size="large" class="rrss-verde"></ion-icon>
                </li>
                </ul>
            </div>
        </footer>
    </div>
    <script src="{{ asset('js/helpers/carritoHelper.js') }}"></script>
    @yield('js')
</body>
</html>
