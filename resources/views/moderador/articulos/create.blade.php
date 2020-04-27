@extends('layouts.appModerador')

@section('content')
<script src="//cdn.ckeditor.com/4.14.0/full/ckeditor.js"></script>
<form method="POST" action="{{ route('moderardor.articulos.store') }}" enctype="multipart/form-data" class="temaFormuEdit">
    @csrf
    <div class="container">
                @if(session('notificacion'))
                <div class="alert alert-success mt-2" role="alert">
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
                        <input type="text" class="form-control" name="titulo" value="{{ old('titulo') }}">
                        
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Categoria</label>
                    <select class="form-control" name="theme_id">
                        @foreach ($temasTodos as $tema)
                            <option value="{{ $tema->id }}">@if(old('id') == $tema->id) selected @endif> {{ $tema->nombre }} </option>
                        @endforeach
                    </select>

                </div>
                <hr>
                <div class="form-group">
                    <label for="exampleInputPassword1">Contenido</label>
                    <textarea class="form-control" rows="5" name="contenido">{{ old('contenido') }}</textarea>
                    <script>
                        CKEDITOR.replace('contenido');
                    </script>
                </div>
                <hr>
                <div class="col-12">
                    <input type="file" name="foto1">
                </div>
                <hr>
                <button type="submit" class="btn btn-info">Añadir</button>
                </div>    
        </div>   
    </div> 
</form>

@endsection