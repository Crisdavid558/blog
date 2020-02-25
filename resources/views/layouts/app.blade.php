<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title','ING.INDUSTRIAL')</title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

</head>
<body>
<header class="header">
 
    <div class="barra">
        <div class="container-fluid">
            <nav class="navbar navbar-dark justify-content-between navbar-expand-lg bg-transparent menu">
                <a class="navbar-brand tipoa" href="#">INGENIERIA INDUSTRIAL</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse tipob" id="navbarNavDropdown">
                        <ul class="navbar-nav w-100 justify-content-end">
                            <li class="nav-item">
                                <a class="nav-link" href="#">Inicio </a>
                            </li>
                            @guest
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="modal" data-target="#loginModal">{{ __('Login') }}</a>
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
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="anunciosdropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Contenido
                                </a>
                                <div class="dropdown-menu" aria-labelledby="anunciosdropdown">

                                    @foreach($temasTodos as $tema)
                                    <a class="dropdown-item" href="#">{{ $tema->nombre }}</a>
                                    @endforeach
                                    {{-- <a class="dropdown-item" href="#">Semestre 1</a>
                                    <a class="dropdown-item" href="#">Semestre 2</a>
                                    <a class="dropdown-item" href="#">Semestre 3</a>
                                    <a class="dropdown-item" href="#">Semestre 4</a>
                                    <a class="dropdown-item" href="#">Semestre 5</a>
                                    <a class="dropdown-item" href="#">Semestre 6</a>
                                    <a class="dropdown-item" href="#">Semestre 7</a>
                                    <a class="dropdown-item" href="#">Semestre 8</a>
                                    <a class="dropdown-item" href="#">Semestre 9</a> --}}
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Avisos</a>
                            </li>

                        </ul>
                </div>
            </nav>
        </div>
    </div>


</header>

@yield('content')


<footer class="footer mt-5">
    <div class="container h-100">
        <div class="row justify-content-center align-items-center logistica">
            <div class="col-lg-4 text-center text-light">
                <h1 class="nombre-sitio">
                    INGENIERIA LOGÍSTICA
                </h1>
                <a href="#" class="btn-primary text-dark btn text-uppercase ">
                    Vísita la página
                </a>
            </div>
        </div>
    </div>
    <p class="copyright m-0 text-center py-3 text-light bg-success">
        ITCJ ING.INDUSTRIAL &copy; 2020.
    </p>
</footer>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>
<script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
@yield('include-login-modal')

</body>
</html>