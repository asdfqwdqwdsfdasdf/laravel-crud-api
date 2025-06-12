<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaginaController;

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

Route::get('/test', function () {
    return view('welcome2');
});

Route::get('/inicio', [PaginaController::class, 'inicio']);
Route::get('/inicio', [PaginaController::class, 'inicio']);
Route::get('/saludo/{nombre}', function($nombre){
    return "Hola, $nombre";
});


