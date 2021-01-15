<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MiPrimerController extends Controller
{
    public function inicio()
    {
        return view('quienessomos')->with('nombre', 'miguel');
    }


    public function final($nombre)
    {
        //return view('dondeestamos',[nombre=>'miguel']);
        return view('dondeestamos',compact('nombre'));
    }

    public function contenido()
    {
        return view('/layout/prueba');
    }
}
