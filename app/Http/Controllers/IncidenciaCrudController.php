<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Incidencia;
use App\Models\Usuario;

class IncidenciaCrudController extends Controller
{
    public function index()
    {
        // Obtener el usuario actualmente autenticado o guardado en la sesión
        $usuario = session('usuario');

        // Obtener las incidencias asociadas al usuario
        $incidencias = Incidencia::where('ID_Cliente', $usuario->ID_Usuario)->get();

        return view('incidencias.index', compact('incidencias'));
    }

    // Otros métodos como create, store, show, edit, update, destroy pueden ser implementados según sea necesario
}
