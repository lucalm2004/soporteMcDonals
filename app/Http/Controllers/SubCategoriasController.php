<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class SubCategoriasController extends Controller
{
    public function index()
    {
        $subcategorias = DB::table('subcategorias as sub')
                        ->join('categorias as cat', 'sub.ID_Categoria', '=', 'cat.ID_Categoria')
                        ->select('sub.*', 'cat.Nombre_Categoria as categoria')
                        ->get();

        return response()->json($subcategorias);
    }
}
