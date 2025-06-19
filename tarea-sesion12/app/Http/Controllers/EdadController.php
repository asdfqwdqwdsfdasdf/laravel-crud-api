<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EdadController extends Controller
{
    public function validar($edad)
    {
        $mensaje = $edad >= 18 ? 'Eres mayor de edad.' : 'Eres menor de edad.';
        return view('validarEdad', compact('mensaje'));
    }
}
