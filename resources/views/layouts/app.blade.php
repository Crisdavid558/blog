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

                        <form class="form-inline" action="{{url('/buscador')}}" method="GET">
                            @csrf
         
                        <div class="form-group mx-sm-3 mb-2">
                          <label for="inputPassword2" class="sr-only"></label>
                          <input type="text" class="form-control" id="Buscar" name="busqueda" placeholder="Industrial y Logística">
                        </div>
                        <button type="submit" class="btn btn-primary m-2">Buscar</button>
                      </form>






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
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>
    
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                      @if(auth()->user()->hasRole('administrador'))
                                      <a class="dropdown-item" href="{{ url('/admin/temas') }}">Zona Administración</a>
                                      @endif
                                      @if(auth()->user()->hasRole('moderador'))
                                      <a class="dropdown-item" href="{{ url('moderador/articulos') }}">Zona Administración</a>
                                      @endif

                                        <a class="dropdown-item" href="{{ url('/home') }}">Zona Privada</a>
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
                                        
                                        <a class="dropdown-item" href="{{ route('tema.show' ,$tema) }}">{{ $tema->nombre }}</a>
                               
    
                                        @endforeach
   
                                    </div>
                                </li>
   
    
                            </ul>
                    </div>
                </nav>
            </div>
        </div>






 
    

        <div class="container-fluid posicion">
            <div class="row">
                <div class="col-6 col-lg-3 imagen1">
                   
               
                </div>
                <div class="col-6 col-lg-3 imagen2">
                   
                </div>
                
            </div>
          </div>

          <div class="container posicion2">
            <h2 class="text-center font-weight-bold text-light display-4 d-none d-lg-block">"La Fuerza del conocimiento</h2>
            <h2 class="text-center font-weight-bold text-light display-4 d-none d-lg-block">a la Liberación del Espíritu"</h2>
          
          </div>

          <div class="container posicion3">
              <div class="row">
                <div class="offset-3 col-6 col-lg-3 imagen3">
                 
                </div>
                <div class="col-6 col-lg-3 imagen4">
                   
                </div>
              </div>
           
          </div>

          <div class="container-fluid posicion4">
            <div class="row">
                <div class="col-6 imagen5">
               
                    
                </div>
                <div class="col-6 imagen6">
                
                    
                </div> 
            
            
                <div class="col-6 imagen7">
                   
                </div>
                <div class="col-6 imagen8">
    
                </div>
            </div>
          </div>





    </header>


          
     





@yield('content')


<footer class="footer">

    <p class="copyright m-0 text-center py-3 text-light bg-success">
        DEPARTAMENTO DE INDUSTRIAL Y LOGÍSTICA &copy; 2020.
    </p>
</footer>

<!-- Scripts -->







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