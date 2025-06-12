<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;

/*
|--------------------------------------------------------------------------
| RUTAS LARAVEL
|--------------------------------------------------------------------------
*/

// 1. Ruta básica con fecha dinámica
Route::get('/fecha-hoy', function () {
    return 'Hoy es ' . date('d/m/Y');
});

// 2. Ruta que retorna una vista con datos
Route::get('/inicio', function () {
    $mensaje = 'Bienvenido a la página de inicio';
    return view('inicio', ['mensaje' => $mensaje]);
})->name('dashboard'); // Le pongo nombre para usar en la redirección luego

// 3. Ruta usando un controlador con parámetro
Route::get('/perfil/{usuario}', [UsuarioController::class, 'perfil']);

// 4. Ruta con parámetro dinámico y vista saludo
Route::get('/saludo/{nombre}', function ($nombre) {
    return view('saludo', ['nombre' => $nombre]);
});

// 5. Ruta con nombre personalizado y vista que genera enlace
Route::get('/contacto', function () {
    return view('contacto');
})->name('contacto');

// 6. Ruta con cálculo dinámico (cuadrado)
Route::get('/cuadrado/{numero}', function ($numero) {
    $cuadrado = $numero * $numero;
    return view('cuadrado', ['numero' => $numero, 'cuadrado' => $cuadrado]);
});

// 7. Ruta que muestra una lista dinámica de productos
Route::get('/productos', function () {
    $productos = ['Camiseta', 'Pantalón', 'Zapatos', 'Sombrero'];
    return view('productos', ['productos' => $productos]);
});

// 8. Ruta que genera tabla de multiplicar
Route::get('/tabla/{numero}', function ($numero) {
    $tabla = [];
    for ($i = 1; $i <= 10; $i++) {
        $tabla[$i] = $numero * $i;
    }
    return view('tabla', ['numero' => $numero, 'tabla' => $tabla]);
});

// 9. Ruta con múltiples parámetros que suma dos números
Route::get('/suma/{a}/{b}', function ($a, $b) {
    $suma = $a + $b;
    return view('suma', ['a' => $a, 'b' => $b, 'suma' => $suma]);
});

// 10. Ruta con nombre y redirección
Route::get('/panel', function () {
    return redirect()->route('dashboard');
});
