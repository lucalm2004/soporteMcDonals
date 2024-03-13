<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subcategoria;

class SubcategoriaController extends Controller
{
    public function obtenerSubcategorias($idCategoria)
    {
        // Obtener subcategorías con el ID de categoría proporcionado
        $subcategorias = Subcategoria::where('ID_Categoria', $idCategoria)->get();
        
        // Devolver las subcategorías como respuesta en formato JSON
        return response()->json($subcategorias);
    }
}
