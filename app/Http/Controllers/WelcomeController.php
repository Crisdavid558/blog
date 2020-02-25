<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Theme;

class WelcomeController extends Controller
{
    public function welcome(){


        $temasTodos=Theme::all();

        return view('welcome')->with(compact('temasTodos'));
    }
}
