<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Theme;

class ThemeController extends Controller
{
    public function show(Theme $tema)
    {
        //$temasTodos=Theme::all();
        $articulos=$tema->articles()->where('activo', '=' , 1)->with(['images'])->orderBy('id', 'desc')->get();
        return view('tema.articulos')->with(compact('tema' , 'articulos'));
    }
}
