<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $mensajes = array(
            'name.required' => 'El nombre es obligatorio',
            'name.max' => 'El nombre demasiado largo',

            'email.required' => 'El email es obligatorio',
            'email.max' => 'El email demasiado largo',
            'email.unique' => 'El email ya existe en nuestra base de datos',
            'email.email' => 'El email debe ser un email válido',

            'alias.required' => 'El alias es obligatorio',
            'alias.min' => 'El alias es demasiado corto',
            'alias.max' => 'El alias es demasiado largo',
            'alias.unique' => 'El alias ya ha sido registrado',

            'password.required' => 'Contraseña requerida',
            'password.confirmed' => 'Las contraseñas no coinciden',
            'password.regex' => 'La contraseña debe tener un mínimo de 8 caracteres y contener al menos una letra mayúscula, una letra minúscula
             y un número',
        );

        return Validator::make($data, [
            'name' => ['required', 'string', 'max:40'],
            'email' => ['required', 'string', 'email', 'max:190', 'unique:users'],
            'alias' => ['required', 'string', 'min:3', 'max:20', 'unique:users' ],
            'password' => array('required', 'string', 'confirmed', 'regex:/(?=^.{8,}$)((?=.*\d)|(?=.*W+))(?![.\n])(?=.*[A-Z])(?=.*[A-Z]).*$/'),
        ],$mensajes);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'alias' => $data['alias'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
