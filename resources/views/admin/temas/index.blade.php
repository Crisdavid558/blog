@extends('layouts.appAdmin')

@section('content')

<section>
    <div class="container mt-3">
        <button type="button" class="btn btn-light mb-2"><a href="{{ route('tema.create') }}">Añadir nuevo tema</a></button>
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

        <div class="table-responsive">
        <table class="table table-hover">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Autor</th>
                <th scope="col">Fecha de creación</th>
                <th scope="col">Subscripción</th>
                <th scope="col">Destacado</th>
                <th scope="col">Editar</th>
                <th scope="col">Eliminar</th>
            </tr>
        </thead>
        @foreach ($temas as $tema)
            <tbody>
                <tr>
                    <th scope="row">{{ $tema->id }}</th>
                    <td>{{ $tema->nombre }}</td>
                    <td>{{ $tema->user->name }}</td>
                    <td>{{ $tema->created_at->toDayDateTimeString() }}</td>
                    <td>{{ $tema->Essuscripcion }}</td>
                    <td>{{ $tema->Esdestacado }}</td>
                    <td>
                        <a href="{{ route('tema.edit', $tema) }}">
                            <img class="img-fluid w-25" src="{{ asset('imagenes/admin/editar.png') }}" alt="title 1" title="title 1">
                        </a>

                    </td>
                    <td>
                        <form method="POST" action="{{ route('tema.delete', $tema) }}">
                            @csrf
                            {{ method_field('DELETE') }}
                            <button class="btn btn-light btn-link btn-outline-primary" type="submit">
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