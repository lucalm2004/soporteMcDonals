<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categoria;

class categoriasController extends Controller
{
    public function index(Request $request)
    {
        $query = categoria::select('*');

        $resultado = $query->get();

        return response()->json($resultado);
    }

   
}
