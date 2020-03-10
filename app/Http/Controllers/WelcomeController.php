<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;



class WelcomeController extends Controller
{
    public function welcome(){


        //$temasTodos=Theme::all();

        return view('welcome');
    }
}
