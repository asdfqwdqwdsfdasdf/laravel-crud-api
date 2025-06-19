<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BienvenidaController extends Controller
{
    public function saludo($nombre = "Invitado")
    {
        return view('bienvenida', compact('nombre'));
    }
}
