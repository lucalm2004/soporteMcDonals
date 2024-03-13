<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Incidencia;

class IncidenciaController extends Controller
{
    public function crearIncidencia(Request $request)
    {
        // Validar los datos recibidos
        $request->validate([
            'subcategoriaId' => 'required',
            'comentario' => 'required',
        ]);

        // Crear una nueva instancia del modelo Incidencia con los valores deseados
        $incidencia = new Incidencia();
        $incidencia->ID_Cliente = 1; // ID del usuario = 1
        $incidencia->Data_Alta = now(); // Fecha y hora actual
        $incidencia->Estado = 'sin_asignar';
        $incidencia->Comentario_Cliente = $request->comentario;
        $incidencia->ID_subcategoria = $request->subcategoriaId;

        // Guardar la incidencia en la base de datos
        $incidencia->save();

        // Devolver una respuesta
        return response()->json(['message' => 'Incidencia creada exitosamente']);
    }
}
