<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SaludoController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\EdadController;
use App\Http\Controllers\BienvenidaController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\TemperaturaController;
use App\Http\Controllers\NotaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\SumarController;
use App\Http\Controllers;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});




// EJERCICIO 1
Route::get('/saludo/{nombre}/{edad}', [SaludoController::class, 'mostrarSaludo']);


// EJERCICIO 2
Route::get('/registro', [RegistroController::class, 'formulario']);
Route::post('/registro', [RegistroController::class, 'procesar']);

// EJERCICIO 3
 
Route::get('/validar-edad/{edad}', [EdadController::class, 'validar']);

// EJERCICIO 4

Route::get('/contacto', [ContactoController::class, 'formulario']);
Route::post('/contacto', [ContactoController::class, 'procesar']);

// EJERCICIO 5
Route::get('/acerca-de', function () {
    return view('acerca');
})->name('acerca');

Route::get('/', function () {
    return view('inicio');
});

// EJERCICIO 6
 
Route::get('/bienvenida/{nombre?}', [BienvenidaController::class, 'saludo']);

// EJERCICIO 7

Route::get('/convertir', [TemperaturaController::class, 'formulario']);
Route::post('/convertir', [TemperaturaController::class, 'convertir']);

// EJERCICIO 8
Route::get('/producto/{id}', [ProductoController::class, 'mostrar']);

// EJERCICIO 9


Route::get('/calificar', [NotaController::class, 'formulario']);
Route::post('/calificar', [NotaController::class, 'evaluar']);

// EJERCICIO 10
Route::get('/sumar/{a}/{b}/{c}', [SumarController::class, 'sumar']);
 
