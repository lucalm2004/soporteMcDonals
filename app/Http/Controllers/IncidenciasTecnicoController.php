<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Incidencia;

class IncidenciasTecnicoController extends Controller
{
    public function index()
    {
        // Obtener el ID del técnico desde la sesión
        $user = session('usuario');
        $tecnico_id = $user->ID_Usuario;
    
        // Obtener las incidencias del técnico
        $incidencias = Incidencia::where('ID_Tecnico', $tecnico_id)->get();
    
        // Retornar las incidencias en formato JSON
        return response()->json(['incidencias' => $incidencias]);
    }
}
