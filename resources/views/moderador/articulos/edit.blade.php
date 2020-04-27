@extends('layouts.appModerador')

@section('content')
<script src="//cdn.ckeditor.com/4.14.0/full/ckeditor.js"></script>
<form method="POST" action="{{ route('moderador.articulos.update' ,$articulo->id) }}" enctype="multipart/form-data" class="temaFormuEdit">
    @csrf
    {{ method_field('PUT') }}

    <div class="container">
        @if(session('notificacion'))
        <div class="alert alert-success" role="alert">
            {{ session('notificacion') }}
        </div>
        @endif
                    @if($errors->any())
                    <div class="alert alert-danger mt-2" role="alert">
                            @foreach($errors->all() as $error)
                            {{ $error }}
                            @endforeach
                    </div>
                @endif

     
        

        <div class="row">
            <div class="col-12 col-md-2"></div>
            <div class="col-12 col-md-8 mt-2 mb-2">
   
          
               
                <div class="form-group">
                    <label for="exampleInputPassword1">Titulo</label>
                        <input type="text" class="form-control" name="titulo" value="{{ old('titulo' ,$articulo->titulo) }}">
                        
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Categoria</label>
                    <select class="form-control" name="id">
                        @foreach ($temasTodos as $tema)
                        <option value="{{ $tema->id }}" {{ old('id', $articulo->theme_id) == $tema->id ? 'selected' : '' }}>
                            {{ $tema->nombre }}
                        </option>
                        @endforeach
                    </select>

                </div>
                <hr>
                <div class="form-group">
                    <label for="exampleInputPassword1">Contenido</label>
                    <textarea class="form-control" rows="5" name="contenido">{{ old('contenido' ,$articulo->contenido) }}</textarea>
                    <script>
                        CKEDITOR.replace('contenido');
                    </script>
                </div>
                <hr>
                @foreach($articulo->images as $imagen)
                <img class="img-fluid w-50" src="{{ Storage::url('imagenesArticulos/' .$imagen->nombre) }}">
                <a href="{{ route('moderador.imagen.delete' ,$imagen) }}">
                    <img class="img-fluid m-2 w-25" src="{{ asset('imagenes/admin/eliminar.png') }}">
                </a>
              @endforeach
              @if($articulo->images->count()<1)
              <p class="display-4">Añadir imagen (Máximo 1 imagen por artículo)</p>
              @endif
              <div class="container">
                  @for($i=1;$i>$articulo->images->count();$i--)
                  <div class="mt-2 row">
                      <div class="col-1">
                          <input type="file" name="foto{{ $i }}">
                      </div>
                  </div>
                  @endfor
              </div>
                <hr>
                <button type="submit" class="btn btn-info">Añadir</button>
                </div>    
        </div>   
    </div> 
</form>

@endsection