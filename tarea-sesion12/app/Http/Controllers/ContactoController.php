<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactoController extends Controller
{
    public function formulario()
    {
        return view('formContacto');
    }

    public function procesar(Request $request)
    {
        $asunto = $request->input('asunto');
        return view('respuestaContacto', compact('asunto'));
    }
}
