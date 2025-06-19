<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SumarController extends Controller
{
 

    public function sumar($a,$b,$c)
    {
        $resultadosuma = $a + $b + $c;
        return view('resultadoSumas', compact('resultadosuma'));
    }
}
