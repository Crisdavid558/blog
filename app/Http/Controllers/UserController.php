<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function update(Request $request)
    {

        $usuario=auth()->user();
        $messages=[
            'nombre.required' => 'El nombre es obligatorio',
            'nombre.max' => 'El nombre es demasiado largo',

            'alias.required' => 'El alias es obligatorio',
            'alias.min' => 'El alias es demasiado corto',
            'alias.max' => 'El alias es demasiado largo',
            'alias.unique' => 'El alias ya ha sido registrado',

            'password.required' => 'Contraseña requerida',
            'password.regex' => 'La contraseña debe tener un mínimo de 8 caracteres y contener al menos una letra mayúscula, una letra minúscula
             y un número',
        ];

        $rules=[
            'nombre' => ['required', 'string', 'max:40'],
            /*'alias' => ['required', 'string', 'min:3', 'max:20', 'unique:users' ],*/
            'alias' => ['required', 'string', 'min:3', Rule::unique('users')->ignore($usuario->id)],
            'password' => array('required', 'string', 'regex:/(?=^.{8,}$)((?=.*\d)|(?=.*W+))(?![.\n])(?=.*[A-Z])(?=.*[A-Z]).*$/')
        ];




        $this->validate($request, $rules, $messages);


    
        $usuario->name=$request->nombre;
        $usuario->alias=$request->alias;
        $usuario->password=bcrypt($request->password);
        $usuario->update();
        $notificacion="Sus datos se han actualizado correctamente";
        return back()->with(compact('notificacion'));
    }
}
