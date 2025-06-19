<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SaludoController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\EdadController;
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



