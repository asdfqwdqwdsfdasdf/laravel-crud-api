<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SaludoController extends Controller
{
    public function mostrarSaludo($nombre, $edad)
    {
        return view('saludo', compact('nombre', 'edad'));
    }
}
