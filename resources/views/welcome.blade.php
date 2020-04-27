@extends('layouts.app')

@section('content')




<section class="video">
    <h2 class="separador text-center mt-5 publicaciones-destacadas"> Liebres Industriales por el Mundo</h2>
    <div class="container">
       
        <div class="row">
            <div class="col-lg-6 embed-responsive embed-responsive-16by9 mt-5">
                <video class="embed-responsive-item" src="assets/video/concierto.mp4" controls autoplay loop></video>
            </div>
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-12 text-center">
                        <img src="assets/img/libro.png" alt="icono" class="img-fluid w-25">
                        <h3 class="mt-5 text-uppercase titulos">"Mejorando la educación"</h3> 
                        <p class="parrafo">Aquí encontrarás noticias, archivos e información necesaria para tus clases. </p> 
                     </div>

  
                </div>
            </div>

        </div>
    </div>
    <br/><br/><br/><br/><br/>
</section>




<section class="section clases">
  
  @foreach($temasDestacados as $temaDestacado)

    <h2 class="separador text-center mb-5 publicaciones-destacadas"> Publicaciones Destacadas </h2>
    <div class="container-fluid">
    <div class="row">

            
 
      @foreach($temaDestacado->articles->sortBydesc('id')->take(3) as $articulo)
      <div class="col-12 col-lg-4">

        
    <div class="card" id="#{{ $articulo->id }}">
    <img src="{{ Storage::url('imagenesArticulos/'.$articulo->imagenDestacada()) }}" class="card-img-top">
    <div class="card-meta bg-primary p-2 text-light">
    <p class="m-0  text-center">{{$articulo->created_at->toDayDateTimeString()}}</p>
    </div>
    <div class="card-body">
    <h3 class="card-title">{{$articulo->titulo}}</h3>
    <p class="card-subtitle my-2">{{$articulo->contenido}}</p>
    <a href="#{{ $articulo->id }}"  class="btn btn-primary" data-toggle="modal" data-target="#modalQuickView{{ $articulo->id }}">Ver Más</a>


  </div>

    </div>

    
   

  </div>
    @endforeach
 
 
  </div>
    




  

    @foreach ($temaDestacado->articles->sortBydesc('id')->take(3) as $articulo)

    <!-- Modal: modalQuickView -->
    <div class="modal fade" id="modalQuickView{{ $articulo->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <div class="row">
              <div class="col-lg-5">
                <!--Carousel Wrapper-->
                <div id="carousel-thumb" class="carousel slide carousel-fade carousel-thumbnails"
                  data-ride="carousel">
                  <!--Slides-->
                  <div class="carousel-inner" role="listbox">
                    @if($articulo->images->first())
                    @foreach($articulo->images as $imagen)
                    <div class="carousel-item active">
                     
                      <img class="d-block w-100"
                        src="{{ Storage::url('imagenesArticulos/'.$articulo->imagenDestacada()) }}"
                        alt="First slide">
                        
                    </div>
           
                    @endforeach
                    @endif
                  </div>
                </div>
              </div>
              <div class="col-lg-7">
                <h2 class="h2-responsive product-name">
                  <strong>{{ $articulo->titulo }}</strong>
                </h2>
                <div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true">
    
                  <!-- Accordion card -->
                  <div class="card">
    
                    <!-- Card header -->
                    <div class="card-header" role="tab" id="headingOne1">
                      <a data-toggle="collapse" data-parent="#accordionEx" href="#collapseOne1" aria-expanded="true"
                        aria-controls="collapseOne1">
                        <h5 class="mb-0">
                          Contenido <i class="fas fa-angle-down rotate-icon"></i>
                        </h5>
                      </a>
                    </div>
    
                    <!-- Card body -->
                    <div id="collapseOne1" class="collapse show" role="tabpanel" aria-labelledby="headingOne1"
                      data-parent="#accordionEx">
                      <div class="card-body">
                        {!! $articulo->contenido !!}
                      </div>
                    </div>
    
                  </div>
                  <!-- Accordion card -->
    


                  <!-- Accordion card -->
    
                </div>
                <!-- Accordion wrapper -->
    
    
                <!-- Add to Cart -->
                <div class="card-body">
   
                  <div class="text-center">
    
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary">Dirección
                      <i class="fas fa-cart-plus ml-2" aria-hidden="true"></i>
                    </button>
                  </div>
                </div>
                <!-- /.Add to Cart -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    @endforeach
    @endforeach


    </div>
</section>




















<div class="timeline-container" id="timeline-1">
    <div class="timeline-header">
      <h2 class="timeline-header__title">Linea del tiempo</h2>
      <h3 class="timeline-header__subtitle">Avance Curricular</h3>
    </div>
    <div class="timeline">
      <div class="timeline-item" data-text="Actividades Complementarias">
        <div class="timeline__content"><img class="timeline__img" src="assets/img/industrial6.jpg" />
          <h2 class="timeline__content-title">SEMESTRE 1-2</h2>
          <p class="timeline__content-desc">Realizar las actividades complementarias en los primeros dos semestres. Tutorias, 
            dos semestres de extraescolares y carnet (60 horas).
                </p>
        </div>
      </div>
      <div class="timeline-item" data-text="Servicio Social">
        <div class="timeline__content"><img class="timeline__img" src="assets/img/industrial8.jpg" />
          <h2 class="timeline__content-title">Semestre 6-8</h2>
          <p class="timeline__content-desc">Se necesita haber completado las actividades complementarias. Cantidad de créditos necesarios: 50%
              adentro de la institución y 60% en otra depedencia. 
          </p>
        </div>
      </div>
      <div class="timeline-item" data-text="Especialidad">
        <div class="timeline__content"><img class="timeline__img" src="assets/img/industrial9.jpg"/>
          <h2 class="timeline__content-title">Ing. Industrial semestre: 6-10</h2>
          <p class="timeline__content-desc">A partir del semestre 6 se puede escojer la especialidad. En ingenieria industrial hay tres especialidades:
            Cantidad y Productividad, Manufactura Avanzada y Desarrollo de Negocios.
          </p>
        </div>
      </div>
      <div class="timeline-item" data-text="Especialidad">
        <div class="timeline__content"><img class="timeline__img" src="assets/img/industrial10.jpg"/>
          <h2 class="timeline__content-title">Ing. Logística semestre: 6-10</h2>
          <p class="timeline__content-desc">A partir del semestre 6 se puede escojer la especialidad. En ingenieria logística está la especialidad
              de Planeación del Abastecimiento.
          </p>
        </div>
      </div>
      <div class="timeline-item" data-text="Residencia Profesional">
        <div class="timeline__content"><img class="timeline__img" src="assets/img/industrial11.jpg"/>
          <h2 class="timeline__content-title">Semestre: 8-12</h2>
          <p class="timeline__content-desc"> Se necesitan el 80% de créditos y haber completado el servicio social.</p>
        </div>
      </div>
      <div class="timeline-item" data-text="Práctica Profesional">
        <div class="timeline__content"><img class="timeline__img" src="assets/img/industrial13.jpg"/>
          <h2 class="timeline__content-title">Semestre 1-12</h2>
          <p class="timeline__content-desc">No son obligatorias. Pueden realizarse en cualquier transcurso de la carrera.</p>
        </div>
      </div>
      <div class="timeline-item" data-text="Inglés">
        <div class="timeline__content"><img class="timeline__img" src="assets/img/industrial17.jpg"/>
          <h2 class="timeline__content-title">Semestre 1-</h2>
          <p class="timeline__content-desc">Puede realizarse en cualquier transcruso de la carrera o después de haber terminado
              la retícula. Es obligatorio haber acréditado hasta el nivel 3 o acreditar el examen profesional </p>
        </div>
      </div>

    </div>
  </div>































 
@include('includes.login-modal')
@endsection

@if($errors->any())
    @section('include-login-modal')
    @section('.mdb-select')
    <script src="{{ asset('js/login-modal.js') }}" defer></script>
    @endsection
@endif