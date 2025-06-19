<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotaController extends Controller
{
    public function formulario()
    {
        return view('calificar');
    }

    public function evaluar(Request $request)
    {
        $nota = $request->input('nota');
        $resultado = $nota >= 11 ? 'Aprobado' : 'Desaprobado';
        return view('resultadoNota', compact('resultado'));
    }
}
