<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\HomeMiddleware;


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

// Route::get('/', function () {return view('home');});
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
        Route::view('home_tecnico', 'home_tecnico');
    });
    
    Route::middleware('cliente')->group(function () {
        Route::view('home_cliente', 'home_cliente');
    });
