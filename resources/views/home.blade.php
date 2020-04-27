@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">


            <form method="POST" action="{{  url('/usuario-actualizar') }}">
                @csrf
                {{ method_field('PUT') }}

                @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>   
                        @endforeach
                    </ul>
                </div>
                @endif

                @if(session('notificacion'))
                <div class="alert alert-success" role="alert">
                    {{ session('notificacion') }}
                </div>
                @endif



                <div class="form-group">
                    <label for="exampleInputPassword1">Nombre</label>
                    <input type="text" class="form-control" name="nombre" value="{{ old('nombre') ?? auth()->user()->name }}">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Contraseña</label>
                    <input type="password" class="form-control" name="password" placeholder="Introduce tu contraseña anterior o una nueva contraseña">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Alias</label>
                    <input type="text" class="form-control" name="alias" value="{{ old('alias') ?? auth()->user()->alias }}">
                </div>
                <button type="submit" class="btn btn-info">Actualizar</button>
              </form>

        </div>
    </div>
</div>
@endsection
