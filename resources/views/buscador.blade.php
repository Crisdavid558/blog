@extends('layouts.app')

@section('title','Buscador')
@section('content')


<section class="section clases ">

  @if(!isset($articulosPermitidos))

    <div class="container-fluid">
    <div class="row mt-5">
    @foreach ($articulos as $articulo)
            
    <div class="col-12 col-md-6 col-lg-4">
        
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


  

    @foreach ($articulos as $articulo)



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


    </div>

    </div>

@else



<div class="container-fluid">
  <div class="row mt-5">
  @foreach ($articulosPermitidos as $articulo)
          
  <div class="col-12 col-md-6 col-lg-4">
      
  <div class="card" id="#{{ $articulo->id }}">
  <img src="{{ Storage::url('imagenesArticulos/'.$articulo->imagenDestacada()) }}" class="card-img-top">
  <div class="card-meta bg-primary p-2 text-light">
  <p class="m-0  text-center">{{$articulo->created_at->toDayDateTimeString()}}</p>
  </div>
  <div class="card-body">
  <h3 class="card-title">{{$articulo->titulo}}</h3>
  <p class="card-subtitle my-2"> {!! $articulo->contenido !!}</p>
  <a href="#{{ $articulo->id }}"  class="btn btn-primary" data-toggle="modal" data-target="#modalQuickView{{ $articulo->id }}">Ver Más</a>

  </div>

  
  </div>

  
  </div>  
  @endforeach




  @foreach ($articulosPermitidos as $articulo)



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
                <strong>{{$articulo->titulo}}</strong>
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


  </div>

  </div>



@endif
</section>










@include('includes.login-modal')

@endsection

@if($errors->any())
@section('include-login-modal')
<script src="{{ asset('js/login-modal.js') }}"></script>
@endsection
@endif