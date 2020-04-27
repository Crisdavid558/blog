@extends('layouts.appAdmin')

@section('content')
<div class="container">
	<div class="row text-center">
	    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2"></div>
	    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
	    	@foreach($articulo->images as $imagen)
	    		<img class="w-50 img-fluid" src="{{ Storage::url('imagenesArticulos/'.$imagen->nombre) }}">
	    	@endforeach
	    </div>
	</div>
	<div class="row text-center">
		<div class="col-xs-12 col-sm-12 col-md-1 col-lg-1"></div>
		<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
			{!! $articulo->contenido !!}
		</div>
	</div>
</div>
@endsection