<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistroController extends Controller
{
    public function formulario()
    {
        return view('registro');
    }

    public function procesar(Request $request)
    {
        $datos = $request->only(['nombre', 'correo', 'edad']);
        return view('verRegistro', $datos);
    }
}
