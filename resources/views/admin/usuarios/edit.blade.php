@extends('layouts.appAdmin')

@section('content')

<form method="POST" action="{{ route('usuarios.update' ,$usuario) }}" enctype="multipart/form-data" class="temaFormuEdit">
    @csrf
    {{ method_field('PUT') }}

    <div class="container">
   

        <div class="row">
            <div class="col-12 col-md-2"></div>
            <div class="col-12 col-md-8 mt-2 mb-2">
   
                
                <p class="text-uppercase">Bloqueado</p>
                <div class="radio">
                    <label>
                        <input type="radio" name="bloqueado" value="1" @if($usuario->bloqueado) checked @endif>
                        Si
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="bloqueado" value="0" @if(!$usuario->bloqueado) checked @endif>
                        No
                    </label>
                </div>
                <hr>
                <p class="text-uppercase">Moderador</p>
                <div class="radio">
                    <label>
                        <input type="radio" name="moderador" value="1" @if($usuario->hasRole('moderador')) checked @endif>
                        Si
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="moderador" value="0" @if(!$usuario->hasRole('moderador')) checked @endif>
                        No
                    </label>
                </div>
  
    
                <hr>
                <button type="submit" class="btn btn-info">Actualizar</button>
                </div>    
        </div>   
    </div> 
</form>

@endsection