<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title','Administración')</title>
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
                  @if(auth()->check())
                  <p class="text-primary text-uppercase">Bienvenido {{ Auth::user()->name }}</p> 
                    @endif

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse tipob" id="navbarNavDropdown">
                            <ul class="navbar-nav w-100 justify-content-end">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/') }}">Inicio </a>
                                </li>
                              <li class="nav-item">
                                <a class="nav-link" href="{{ url('/moderador/articulos') }}" aria-expanded="false">Articulos </a>
                            </li>
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();document.getElementById('logout-form').submit();"> Cerrar Sesión
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="display">@csrf</form>
                                </div>
                                </li>
                                <button hidden="" class="navbar-toggler navbar-close" type="button" data-toggle="collapse" data-target="button">
                                    <span class="close-icon"></span>
                                </button>
                        
    
                            </ul>
                    </div>
                </nav>
            </div>
        </div>
        
    </header>


    <div class="container">
    <p class="display-4 text-center">@yield('rol', 'Zona Administrador') / {{ $miga }}</p>
  </div>


@yield('content')


<footer class="footer">

    <p class="copyright m-0 text-center py-3 text-light bg-success">
        DEPARTAMENTO DE INDUSTRIAL Y LOGÍSTICA &copy; 2020.
    </p>
</footer>

<script src="{{ asset('js/app.js') }}" defer></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery-3.4.1.min.js') }}"></script>
<script>
    
    (function($) {
  $.fn.timeline = function() {
    var selectors = {
      id: $(this),
      item: $(this).find(".timeline-item"),
      activeClass: "timeline-item--active",
      img: ".timeline__img"
    };
    selectors.item.eq(0).addClass(selectors.activeClass);
    selectors.id.css(
      "background-image",
      "url(" +
        selectors.item
          .first()
          .find(selectors.img)
          .attr("src") +
        ")"
    );
    var itemLength = selectors.item.length;
    $(window).scroll(function() {
      var max, min;
      var pos = $(this).scrollTop();
      selectors.item.each(function(i) {
        min = $(this).offset().top;
        max = $(this).height() + $(this).offset().top;
        var that = $(this);
        if (i == itemLength - 2 && pos > min + $(this).height() / 2) {
          selectors.item.removeClass(selectors.activeClass);
          selectors.id.css(
            "background-image",
            "url(" +
              selectors.item
                .last()
                .find(selectors.img)
                .attr("src") +
              ")"
          );
          selectors.item.last().addClass(selectors.activeClass);
        } else if (pos <= max - 40 && pos >= min) {
          selectors.id.css(
            "background-image",
            "url(" +
              $(this)
                .find(selectors.img)
                .attr("src") +
              ")"
          );
          selectors.item.removeClass(selectors.activeClass);
          $(this).addClass(selectors.activeClass);
        }
      });
    });
  };
})(jQuery);

$("#timeline-1").timeline();
</script>
@yield('include-login-modal')
</body>
</html>