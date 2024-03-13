<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubcategoriaController; // Reemplaza App\Http\Controllers\SubcategoriaController con la ubicación real de tu controlador

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {return view('home');});

Route::get('/subcategorias/{idCategoria}', [SubcategoriaController::class, 'obtenerSubcategorias'])->name("subcategorias");

use App\Http\Controllers\IncidenciaController;

Route::post('/crear-incidencia', [IncidenciaController::class, 'crearIncidencia'])->name('crear.incidencia');

