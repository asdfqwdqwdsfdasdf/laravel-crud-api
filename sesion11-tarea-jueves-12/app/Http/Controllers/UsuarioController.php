<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsuarioController extends Controller
{
       public function perfil($usuario)
    {
        return "Perfil del usuario: " . $usuario;
    }
}
