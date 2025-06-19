<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TemperaturaController extends Controller
{
    public function formulario()
    {
        return view('convertir');
    }

    public function convertir(Request $request)
    {
        $celsius = $request->input('celsius');
        $fahrenheit = ($celsius * 9/5) + 32;
        return view('resultadoTemperatura', compact('fahrenheit'));
    }
}
