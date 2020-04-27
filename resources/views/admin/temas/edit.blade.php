@extends('layouts.appAdmin')

@section('content')

<form method="POST" action="{{ route('tema.update' ,$tema ) }}" class="temaFormuEdit">
    @csrf
    {{ method_field('PUT') }}
    <div class="container">
    

                @if(session('notificacion2'))
                <div class="alert alert-danger mt-2" role="alert">
                    {{ session('notificacion2') }}
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
                    <label for="exampleInputPassword1" class="display-4">Nombre</label>
                    <input type="text" class="form-control" name="nombre" value="{{ old('nombre', $tema->nombre) }}">
                </div>
                <hr>
                <p class="text-uppercase display-4">Destacado</p>
                <div class="radio">
                    <label>
                        <input type="radio" name="destacado" value="1" @if((old('destacado', $tema->destacado))) checked @endif>
                        Si
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="destacado" value="0" @if(!(old('destacado', $tema->destacado))) checked @endif>
                        No
                    </label>
                </div>
                <hr>
                <p class="text-uppercase display-4">Suscripción</p>
                <div class="radio">
                    <label>
                        <input type="radio" name="suscripcion" value="1" @if((old('suscripcion', $tema->suscripcion)))  checked @endif>
                        Si
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="suscripcion" value="0" @if(!(old('suscripcion', $tema->suscripcion)))  checked @endif>
                        No
                    </label>
                </div>
                <button type="submit" class="btn btn-info">Actualizar</button>
                </div>    
        </div>   
    </div> 
</form>

@endsection