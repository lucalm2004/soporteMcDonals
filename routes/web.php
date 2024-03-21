<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\HomeMiddleware;
use App\Http\Controllers\IncidenciasTecnicoController; // Importamos el controlador para las incidencias del técnico
use App\Http\Controllers\TecnicoController;

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

Route::get('/', [AuthController::class, 'index'])->name('home');
Route::post('/home', [AuthController::class, 'login'])->name('login');

// Rutas protegidas

Route::middleware(HomeMiddleware::class)->group(function () {
    Route::view('home', 'home');
});

Route::middleware('auth')->get('/user', function () {
    // Obtenemos el usuario autenticado
    $user = auth()->user();

    // Mostramos los datos del usuario
    return $user;
}); 
    Route::middleware('admin')->group(function () {
        Route::view('home_admin', 'home_admin');
    });
    
    Route::middleware('gestor')->group(function () {
        Route::view('home_gestor', 'home_gestor');
    });
    
    Route::middleware('tecnico')->group(function () {
        // Ruta para mostrar las incidencias del técnico
        Route::get('tecnico_home', [IncidenciasTecnicoController::class, 'index'])->name('tecnico_home');
    });
    
    Route::middleware('cliente')->group(function () {
        Route::view('home_cliente', 'home_cliente');
    });

    // Cliente
    use App\Http\Controllers\SubcategoriaController;

    Route::get('/subcategorias/{idCategoria}', [SubcategoriaController::class, 'obtenerSubcategorias'])->name("subcategorias");

use App\Http\Controllers\IncidenciaController;

Route::post('/crear-incidencia', [IncidenciaController::class, 'crearIncidencia'])->name('crear.incidencia');

use App\Http\Controllers\IncidenciaCrudController;

Route::get('/incidencias', [IncidenciaCrudController::class, 'index'])->name('incidencias.index');

Route::post('/actualizar_estado_incidencia', [IncidenciaController::class, 'actualizarEstado'])->name('actualizar.estado.incidencia');

Route::get('/tecnico/7/incidencias', [TecnicoController::class, 'index']);



