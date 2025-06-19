<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function mostrar($id)
    {
        $producto = match($id) {
            1 => "Laptop",
            2 => "Smartphone",
            default => "Producto no encontrado",
        };

        return view('producto', compact('producto'));
    }
}
