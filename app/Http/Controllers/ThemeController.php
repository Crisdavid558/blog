<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Theme;

class ThemeController extends Controller
{
    public function show(Theme $tema)
    {
        //$temasTodos=Theme::all();
        /*$articulos=$tema->articles()->where('activo', '=' , 1)->with(['images'])->orderBy('id', 'desc')->paginate(6);
        return view('tema.articulos')->with(compact('tema' , 'articulos')); */
        
        $usuarioAutenticado=true;
        $usuarioBloqueado=false;

        if($tema->suscripcion)
        {
            if(auth()->check())
            {
                if(auth()->user()->bloqueado)
                {
                    $usuarioBloqueado=true;
                    return view('tema.articulos')->with(compact('tema', 'usuarioAutenticado', 'usuarioBloqueado'));
                }
                $articulos=$tema->articles()->with(['images'])->orderBy('id', 'desc')->paginate(6);
                return view('tema.articulos')->with(compact('tema','articulos','usuarioAutenticado', 'usuarioBloqueado'));

            }

            $usuarioAutenticado=false;
            return view('tema.articulos')->with(compact('tema', 'usuarioAutenticado', 'usuarioBloqueado'));
        }

        $articulos=$tema->articles()->with(['images'])->orderBy('id','desc')->paginate(6);
        return view('tema.articulos')->with(compact('tema','articulos','usuarioAutenticado','usuarioBloqueado','usuarioVerificado'));
    }
}
