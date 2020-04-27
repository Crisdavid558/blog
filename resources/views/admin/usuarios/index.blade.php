@extends('layouts.appAdmin')

@section('content')

<section>
    <div class="container mt-3">

        <button type="button" class="btn btn-light mb-2"><a href="{{ route('tema.create') }}">Añadir nuevo artículo</a></button>
        @if(session('notificacion'))
        <div class="alert alert-success" role="alert">
            {{ session('notificacion') }}
        </div>
        @endif

        <div class="mt-2">
            <form class="form-inline" action="{{url('admin/buscador/usuarios')}}" method="GET">
                @csrf
                <div class="form-group">
                <input type="text" class="form-control" id="exampleInputEmail2" name="busqueda" placeholder="Buscar">
                </div>
                <button style="margin-top: 8px" type="submit" class="btn btn-warning btn-sm">Buscar</button>
            </form>
        </div>


        <div class="row">
            <p class="display-4">{{ $usuarios->count() }} usuarios</p>
        </div>





        <div class="table-responsive">
        <table class="table table-hover">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Alias</th>
                <th scope="col">Rol</th>
                <th scope="col">Email</th>
                <th scope="col">Fecha Suscripción</th>
                <th scope="col">Bloqueado</th>
                <th scope="col">Editar</th>
            </tr>
        </thead>
        @foreach ($usuarios as $key => $usuario)
            <tbody>
                <tr>
                    <th scope="row">{{ $keys+1 }}</th>
                    <td>{{ $usuario->name }}</td>
                    <td>{{ $usuario->alias }}</td>
                    <td>{{ $usuario->UsuarioRoles }}</td>
                    <td>{{ $usuario->web}}</td>
                    <td>{{ $usuario->email }}</td>
                    <td>{{ $usuario->created_at->toDayDateTimeString() }}</td>
                    <td>{{ $usuario->UsuarioBloqueado }}</td>
                    <td>
                        <a href="{{ route('usuarios.edit', $usuario) }}">
                            <img class="img-fluid w-25" src="{{ asset('imagenes/admin/editar.png') }}" alt="title 1" title="title 1">
                        </a>
                    </td>
                    <tr>
            </tbody>
            
        @endforeach
        </table>
        <div class="row">
            <div class="col-12 col-lg-10 col-lg-offset-1">
                {{ $usuarios->links() }}
            </div>
        </div>
    </div>
    </div>
</section>
    
@endsection