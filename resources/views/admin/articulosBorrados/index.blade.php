@extends('layouts.appAdmin')

@section('content')

<section>
    <div class="container mt-3">

        @if(session('notificacion'))   
            <div class="alert alert-success" role="alert">
              {{session('notificacion')}}
            </div>
        @endif
        @if(session('notificacion2'))   
            <div class="alert alert-success" role="alert">
              {{session('notificacion2')}}
            </div>
        @endif
        <div class="row">
            <strong>{{ $articulos->count() }} articulos</strong>
        </div>


        <div class="table-responsive">
        <table class="table table-hover">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Título</th>
                <th scope="col">Autor</th>
                <th scope="col">Tema</th>
                <th scope="col">Fecha de creación</th>
                <th scope="col">Fecha de eliminación</th>
                <th scope="col">Activado</th>
                <th scope="col">Ver Contenido</th>
                <th scope="col">Restaurar</th>
                <th scope="col">Eliminar</th>
            </tr>
        </thead>
        @foreach ($articulos as $articulo)
            <tbody>
                <tr>
                    <th scope="row">{{ $articulo->id }}</th>
                    <td>{{ $articulo->titulo }}</td>
                    <td>{{ $articulo->user->name }}</td>
                    <td>{{ $articulo->theme->nombre }}</td>
                    <td>{{ $articulo->created_at->toDayDateTimeString() }}</td>
                    <td>{{ $articulo->deleted_at->toDayDateTimeString() }}</td>
                    <td>{{ $articulo->EstaActivado }}</td>
                    <td>
                        <a href="">
                            <img class="img-fluid w-25" src="{{ asset('imagenes/admin/ver.png') }}" alt="title 1" title="title 1">
                        </a>
                    </td>
                    <td>

                        <a href="{{ route('articulos.edit' ,$articulo->id) }}">
                            <img class="img-fluid w-25" src="{{ asset('imagenes/admin/editar.png') }}" alt="title 1" title="title 1">
                        </a>

                    </td>
                    <td>
                        <form method="POST" action="{{ route('articulos.destroy', $articulo->id) }}">
                            @csrf
                            {{ method_field('DELETE') }}
                            <button class="btn btn-light btn-link btn-outline-primary" type="submit" onclick="return confirm('Estás Seguro?')">
                                <img class="img-fluid w-25" src="{{ asset('imagenes/admin/eliminar.png') }}" alt="title 1" title="title 1">
                            </button>
                        </form>
                    </td>
                </tr>
            </tbody>
            
        @endforeach
        </table>
        <div class="row">
            <div class="col-12 col-lg-10 col-lg-offset-1">
                {{ $articulos->links() }}
            </div>
        </div>
    </div>
    </div>
</section>
    
@endsection