<?php

namespace App\Http\Controllers;

use App\Models\incidencia;
use App\Models\usuario;

use Illuminate\Http\Request;

class gestorController extends Controller
{
    public function index(Request $request)
    {
        $query = Incidencia::select('incidencias.*', 'uc.Nom_Usuario AS Cliente', 'uc.Sede', 'ut.Nom_Usuario AS Tecnico', 'sc.Nombre_Subcategoria AS Subcategoria', 'c.Nombre_Categoria AS Categoria')
            ->join('usuarios as uc', 'uc.ID_Usuario', '=', 'incidencias.ID_Cliente')
            ->leftJoin('usuarios as ut', 'ut.ID_Usuario', '=', 'incidencias.ID_Tecnico')
            ->join('subcategorias as sc', 'sc.ID_subcategoria', '=', 'incidencias.ID_subcategoria')
            ->join('categorias as c', 'c.ID_Categoria', '=', 'sc.ID_Categoria');

        if ($request->input('tecnico')) {
            $tecnico = $request->input('tecnico');
            $query->where('ut.ID_Usuario', '=', $tecnico);
        }

        if ($request->input('resolved')) {
            $query->where('Estado', '=', 'resuelta');
        }

        $resultado = $query->get();

        return response()->json($resultado);
    }

    public function select(Request $request)
    {
        // $data = $request->input('');

        $tecnicos = Usuario::where('Rol', '=', "tecnico")
            ->where('Sede', '=', "Barcelona")
            ->get();

        return response()->json($tecnicos);
    }
}
