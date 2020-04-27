@extends('layouts.appAdmin')

@section('content')

<section>
    <div class="container mt-3">
        <form class="form-inline" action="{{url('admin/buscador/articulos')}}" method="GET">
            @csrf
            <div class="form-group">
            <input type="text" class="form-control" id="exampleInputEmail2" name="busqueda" placeholder="Buscar por tema o usuario">
            </div>
            <button style="margin-top: 8px" type="submit" class="btn btn-warning btn-sm">Buscar</button>
        </form>
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
                <th scope="col">Activado</th>
                <th scope="col">Ver Contenido</th>
                <th scope="col">Editar</th>
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
                    <td>{{ $articulo->EstaActivado }}</td>
                    <td>
                        <a href="{{ route('articulos.show', $articulo->id) }}">
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
    </div>
    </div>
</section>
    
@endsection