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
    <script src="{{ asset('js/helpers/carritoHelper.js') }}"></script>
    <script src="https://unpkg.com/ionicons@4.4.2/dist/ionicons.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300|Roboto:100" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    @yield('css')
</head>
<body>
    <div class='main-container'>
        <div class="cabecera">
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
                            <a class="color-verde" href="#">Quienes somos</a>
                        </li>
                        <li>
                            <p>|</p>
                        </li>
                        <li>
                            <a class="color-verde" href="#">Servicio Tecnico</a>
                        </li>
                        <li>
                            <p>|</p>
                        </li>
                        <li>
                            <a class="color-verde" href="#">Monitoreo</a>
                        </li>
                        </ul>
                    </span>
                    <span class="llamenos">
                        <p>Llamenos 0800-888-6666</p>
                    </span>
                    <span class="header-rrss">
                        <ul>
                        <li>
                            <a href="https://twitter.com/"><ion-icon name="logo-twitter" size="large"></ion-icon></a>
                        </li>
                        <li>
                            <a href="https://instagram.com/"><ion-icon name="logo-instagram" size="large"></ion-icon></a>
                        </li>
                        <li>
                            <a href="https://facebook.com/"><ion-icon name="logo-facebook" size="large"></ion-icon></a>
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
                        <a class="nav-link" href="{{ route('listadoPorCategoria', ['id' => 3]) }}">Kits alarmas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('listadoPorCategoria', ['id' => 4]) }}">Camaras</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('listadoPorCategoria', ['id' => 7]) }}">Anti incendios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('listadoPorCategoria', ['id' => 6]) }}">Accesorios</a>
                    </li>
                </ul>
                    </div>
                </nav>
            </header>
            @yield('cabecera')
        </div>
        @yield('content')

        <footer class="main-footer">
            <div class="logo-footer-container">
                <img src="/img/logo.png" alt="" class="logo-footer-img">
            </div>
            <div class="informacion-contacto">
                <ul>
                <li>
                    <p class="footer-info">Av. Corrientes 5067 1º Piso Of. 5. C1414AJD. C.A.B.A.</p>
                </li>
                <li>
                    <p class="footer-info">Tel/Fax: (011) 4209-3622 / (011) 6382-3399</p>
                </li>
                <li>
                    <p class="footer-info">Email: info@helsecurity.com</p>
                </li>
                </ul>
            </div>
            <div class="footer-rrss-container">
                <ul class="footer-rrss-list">
                <li>
                    <ion-icon name="logo-twitter" size="large" class="rrss-verde"></ion-icon>
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
    @yield('js')
</body>
</html>
