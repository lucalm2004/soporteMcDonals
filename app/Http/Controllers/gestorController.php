<?php

namespace App\Http\Controllers;

use App\Models\incidencia;

use Illuminate\Http\Request;

class gestorController extends Controller
{
    public function index(Request $request)
    {
        if ($request->input('busqueda')) {
            // $productos = incidencia::where('id', 'like', "%$data%")
            //     ->orWhere('producto', 'like', "%$data%")
            //     ->orWhere('precio', 'like', "%$data%")
            //     ->get();
        } else {
            $productos = incidencia::join('usuarios', 'ID_Cliente', '=', 'usuarios.ID_Usuario')->get();
        }

        return response()->json($productos);
    }
}
