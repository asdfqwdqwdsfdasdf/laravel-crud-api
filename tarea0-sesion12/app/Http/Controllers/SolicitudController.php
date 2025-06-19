<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SolicitudController extends Controller
{
    public function mostrarFormulario() {
        return view('solicitud');
    }

    public function procesarFormulario(Request $request) {
        $nombre = $request->input('nombre');
        $carrera = $request->input('carrera');
        $mensaje = $request->input('mensaje');

        return view('gracias', compact('nombre', 'carrera', 'mensaje'));
    }
}
